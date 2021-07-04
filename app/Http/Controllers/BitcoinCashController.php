<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Range;
use App\Invoice;

class BitcoinCashController extends Controller
{

    public function show(Request $request) {

        $inversion = $request->inversion;   //Cantidad a invertir

        $amountInvesment = (int)Range::where('range_id', $inversion)->pluck('total_investment')->first();

        $valueBCH = $this->USDtoBCH($amountInvesment);

        $data = $this->createInvoice($valueBCH);

        $code = $data['code'];
        $address = $data['address'];
        $status = $data['status'];
        $user_id = $data['user_id'];

        return view('Pages.ShowAddressInvestment', compact('valueBCH', 'code', 'address', 'status', 'user_id'));
    }

    function createInvoice($valueBCH){
        // dd($valueBCH);

        $user_id = Auth::id();

        $code = $this->generateRandomString();  // Genera un código aleatorio
        $address = $this->generateAddress();

        $status = -1;
        $ip = $this->getIp();

        $invoice = new Invoice();
        $invoice->user_id = $user_id;
        $invoice->code = $code;
        $invoice->address = $address;
        $invoice->price = $valueBCH;
        $invoice->status = $status;
        $invoice->ip = $ip;
        $invoice->save();

        $data = array(
            'code'    => $code,
            'address' => $address,
            'status'  => $status,
            'user_id' => $user_id
        );

        return $data;
    }

    function generateRandomString() {   // Se geenra código aleatorio
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getBCHPrice($currency){    //Se obtiene el valor de la modena en tiempo real
        $content = file_get_contents("https://bch.blockonomics.co/api/price?currency=".$currency);
        $content = json_decode($content);
        $price = $content->price;
        return $price;
    }

    function BCHtoUSD($amount){
        $price = getBCHPrice("USD");
        return $amount * $price;
    }

    function USDtoBCH($amount){ //Se realiza el cálculo respecto a la cantidad de inversión
        $price = $this->getBCHPrice("USD");
        return $amount/$price;
    }

    function generateAddress(){ // Generación de nueva dirección

        // Blockonmics API stuff
        $api_key = "rvlqVWVipRVVagLTJDnl1FCtaqtgHyaaegM9w3XVLEU";
        $url = "https://bch.blockonomics.co/api/new_address";

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        // $header = "Authorization: Bearer " . $api_key;
        // $headers = array();
        // $headers[] = $header;
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $contents = curl_exec($ch);
        // if (curl_errno($ch)) {
        // echo "Error:" . curl_error($ch);
        // }

        // $responseObj = json_decode($contents);
        // $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close ($ch);

        // if ($status == 200) {
        //     echo $responseObj->address;
        // } else {
        //     echo "ERROR: " . $status . ' ' . $responseObj->message;
        // }

        $options = array(
            'http' => array(
                'header'  => 'Authorization: Bearer '.$api_key,
                'method'  => 'POST',
                'content' => '',
                'ignore_errors' => true
            )
        );

        $context = stream_context_create($options);
        $contents = file_get_contents($url, false, $context);
        $object = json_decode($contents);

        // Check if address was generated successfully
        if (isset($object->address)) {
          $address = $object->address;
        } else {
          // Show any possible errors
          $address = $http_response_header[0]."\n".$contents;
        }

        return $address;
    }

    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}