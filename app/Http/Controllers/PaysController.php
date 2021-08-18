<?php

namespace App\Http\Controllers;

use App\Models\AlertsPays;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Pay;
use App\Models\Range;
use App\Models\User;
use App\Models\Status;
use App\Models\Alerts;
use App\Models\Refer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\json_decode;

class PaysController extends Controller {

    public function displayForm(){

        $id = Auth::id();

        $validate_investment = Investment::where('user_id', $id)->exists();
        // dd($validate_investment);

        if ($validate_investment) {
            // $total_pay= number_format(Pay::currencyExchange(), 2, ',', ' ');
            $sponsorTree = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','desc')->first();

            if ($sponsorTree == NULL) {
                $sponsorTree = 1;
            } else {
                $sponsorTree = $sponsorTree->tree_sponsor;
            }

            return view('User.pay', compact('sponsorTree'));

        } else{
            return view('User.firstPay');
        }
    }

    public function annotateImage(Request $request){

        if ($request->file('image')) {
            //convert image to base64
            $user_id = Auth::id();
            $verified_alert= Alerts::where('user_id',$user_id)->where('alert_type','=','Revisar comprobante')->first();
            $response = Http::get('https://api.cambio.today/v1/quotes/COP/USD/json?quantity=1&key=4997|H55YxPENidqz_3kg7RDyiB4CDw*Dp4HO');
            $res = json_decode($response);
            $usd = $res->{'result'}->{'value'};

            $image_temp = $request;
            $image = base64_encode(file_get_contents($request->file('image')));

            //prepare request
            $request = new AnnotateImageRequest();
            $request->setImage($image);
            $request->setFeature("TEXT_DETECTION");
            $gcvRequest = new GoogleCloudVision([$request],  'AIzaSyC8UHFwDHWozW6650FguaZbWz_tMfMDRBo');

            //send annotation request
            $response = $gcvRequest->annotate();

            $code_pay= null;

            if (isset($response->responses[0]->textAnnotations)) {
                $res=count(($response->responses[0]->textAnnotations));
                for ($i=0;$i<$res;$i++) {
                    $read = $response->responses[0]->textAnnotations[$i]->description;
                    if ($read == 'VALOR' || $read=='Valor') {
                        $amount= $response->responses[0]->textAnnotations[$i-1]->description;
                    }

                    if (Str::startsWith($read, '$')) {
                        if (strlen($read)>2) {
                            $amount = $read;
                        } else {
                            $amount= $response->responses[0]->textAnnotations[$i+1]->description;
                        }
                    }

                    if ($read == 'Recibo:' || $read=='RECIBO:') {
                        $code_pay= (int)$response->responses[0]->textAnnotations[$i+1]->description;
                    }
                }

                if (isset($amount)) {

                    $verified_code = Pay::where('code_pay','=',$code_pay)->first();
                    if ($verified_code == NULL) {

                        $amount = (float)ltrim($amount,'$');
                        $amount = (float)str_replace('.','',$amount);
                        $total_pay=(float)number_format((float)Pay::currencyExchange(), 2, '.', '');
                        $margen = $total_pay+5000;

                        $verified_investment = Investment::where('user_id',$user_id)->latest()->first();
                        $range_id = Status::where('user_id',$user_id)->first()->range;
                        $range = Range::where('range_id',$range_id)->first();
                        $range_pay = $range->total_investment;
                        $range_name = $range->range;
                        $deny_investment = 0;

                        if($verified_investment != NULL) {
                            $investment_level = $verified_investment->state;
                            if ($investment_level == $range_name) {
                                $deny_investment = 1;
                            }
                        }
                        if ($amount >= $total_pay && $amount <= $margen && !$deny_investment) {
                            $amount = $amount*$usd;

                            if ($amount >= $range_pay && $amount <= $range_pay+2) {
                                $investments = new Investment();
                                $investments->user_id = Auth::id();
                                $investments->pay = $range_pay;
                                $investments->state = $range_name;
                                $investments->state = $request->tree;
                                $investments->save();
                            }
                        }
                    }
                }
            }
        }

        if (!$code_pay) {
            $code_pay=random_int(0,5000);
            if ($verified_alert == NULL && !isset($amount)) {
                Alerts::comprobantAlert($user_id);
            }
        }

        if(isset($verified_code) && $verified_code == NULL) {
            if (isset($amount)) {
                $pay=floor($amount);
            } else {
                $pay =0;
            }

            $image_temp->file('image')->storeAs(
                'public/invest', $user_id . '.' . $image_temp->image->extension()
            );

            Pay::create([
                'user_id' => $user_id,
                'path_image' => $user_id. '.'. $image_temp->image->extension(),
                'code_pay' => $code_pay,
                'total' => $pay,
            ]);

            if ($pay==0) {
                $error=1;
                return view('Pages.ErrorPay',compact('error'));
            }
        } else {
            if ($verified_alert == NULL) {
                Alerts::comprobantAlert($user_id);
            }
            $error = 1;

            return view('Pages.ErrorPay',compact('error'));
        }

        return view('Pages.GreetingsInvestment',compact('user_id','range_pay'));
    }

    public function bitpay($user_id, $tree) {

        $user_id= (int) $user_id;

        if (Auth::id() == $user_id) {

            $verified_investment = Investment::where('user_id',$user_id)->latest()->first();
            $range_id = Status::where('user_id',$user_id)->first()->range;
            $range = Range::where('range_id',$range_id)->first();
            $range_pay = $range->total_investment;
            $range_name = $range->range;
            $deny_investment = 0;

            if ($verified_investment != NULL) {
                $investment_level = $verified_investment->state;

                if($investment_level == $range_name) {
                    $deny_investment = 1;
                }
            }

            if (!$deny_investment) {
                $investments = new Investment();
                $investments->user_id = $user_id;
                $investments->pay = $range_pay;
                $investments->state = $range_name;
                $investments->tree = $tree;
                $investments->save();
            }
        }

       return view('Pages.GreetingsInvestment',compact('user_id','range_pay'));
    }


    public function index() {
        return view('Pays.index');
    }
}
