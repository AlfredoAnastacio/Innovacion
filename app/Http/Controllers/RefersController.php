<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSponsor;
use App\Models\User;
use App\Models\Refer;
use App\Models\Status;
use App\Models\Range;
use App\Models\PaysCompleted;
use App\Models\Investment;
use App\Models\Commission;
use App\Models\Alerts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RefersController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $id = Auth::id();

        $user = User::where('user_id', $id)->with('range')->first();
        $range = Range::where('range_id',(int) $user->range->range)->first();
        $sponsor = Refer::where('user_id',$id)->first();
        $range_name = $range->range;
        $sponsorTree = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','desc')->first();

        $dataSponsorTrees = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','asc')->get();
        // dd($dataSponsorTrees);

        $investments = Investment::where('user_id', $id)->where('state',$range_name)->first();
        $investments_total = Investment::amountInvestment($investments);
        $commissions_total = Commission::amountCommission($id);
        if ($sponsorTree == NULL) {
            $sponsorTree =1;
        } else {
            $sponsorTree = $sponsorTree->tree_sponsor;
        }

        for($t=1; $t <= $sponsorTree; $t++) {
            $refers = Refer::getRefers($id,0,$t);
            Alerts::investmentAlert($id,$refers);
        }
        $total_refers = Refer::getRefers($id,1,$sponsorTree);
        $amount = count($refers);
        $pays_completed= PaysCompleted::getPays($id,$user->range->range,1);
        $total_pays= PaysCompleted::getPays($id,$user->range->range,2);

        // dd($refers);

        return view('User.tree',compact('user','range','sponsor','investments_total','commissions_total',
                                                'pays_completed','amount','total_refers','total_pays','sponsorTree'));

    //     $user = User::where('user_id', $id)->with('range')->first();
    //     $range = Range::where('range_id',(int) $user->range->range)->first();
    //     $total_pays= PaysCompleted::getPays($id,$user->range->range,2);
    //     $pays_completed= PaysCompleted::getPays($id,$user->range->range,1);

    //     $sponsorTree = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','desc')->first();
    //     if ($sponsorTree == NULL) {
    //         $sponsorTree = 1;
    //     } else {
    //         $sponsorTree = $sponsorTree->tree_sponsor;
    //     }

    //    $refers = Refer::getRefers($id, 0,$sponsorTree);

    //     $amount = count($refers);
    //     $array = array();
    //     $aux = collect();
    //     for ($i = 1; $i <= $amount; $i++) {
    //         foreach ($refers[$i] as $user) {
    //             if (isset($user->user->name)) {
    //                 $name = $user->user->name;
    //                 $aux= $aux->push($name);
    //             }
    //         }
    //         $array[$i] = $aux;
    //     }

    //     $array = json_encode($refers);

    //     dd($refers);

    //     return view('User.tree', compact('sponsorTree', 'range', 'total_pays', 'pays_completed', 'total_refers'));
    }

    public function create() {
        $validate = Refer::where('user_id',Auth::id())->exists();
        if (!$validate) {
            return view('Refers.create');
        }

        return redirect()->action('RefersController@show',Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     *Agrega el Patrocinador
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Refer::where('user_id',Auth::id())->exists();

        if(!$validate)


        {


            $range = Status::where('user_id',$request->sponsor_id)->first()->range;
        $refer = new Refer();

        $refer->user_id =  Auth::id();
        $refer->sponsor_id = $request->sponsor_id;

        DB::table('status')->where('user_id',$request->user_id)
        ->update(['range' => $range]

    );

    $refer->save();

}


        return redirect()->action('RefersController@show',Auth::id());

    }

    /**
     * Muestra los Referidos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tree) {
        $user_id = Auth::id();
        $refers= Refer::getRefers($user_id,0,$tree);
        $levels = count($refers);

        return view('Refers.tree',compact('refers','tree'));
    }

    public function link($referralCode)
    {

        return view('User.create',compact('referralCode'));

    }

    public function detail($tree){
        $user_id = Auth::id();
        $refers= Refer::getRefers($user_id,0,$tree);
        $levels = count($refers);

        return view('Refers.tree',compact('refers','tree'));
    }

}
