<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Investment;
use App\Models\User;
use App\Models\Status;
use App\Models\Refer;
use App\Models\Range;
use App\Models\PaysCompleted;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Redirect;
use App\Models\Alerts;
use App\Models\AlertsPays;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::id();

       return redirect()->action('StatusController@show',$user);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if($id == Auth::id()) {

        $user = User::where('user_id', $id)->with('range')->first();
        $range = Range::where('range_id',(int) $user->range->range)->first();
        $sponsor = Refer::where('user_id',$id)->first();
        $range_name = $range->range;
        
        
        $investments = Investment::where('user_id', $id)->where('state',$range_name)->first();
        
        $investments_total = Investment::amountInvestment($investments);
        
        $commissions_total = Commission::amountCommission($id);
        

        $refers = Refer::getRefers($id,0);
        
        Alerts::investmentAlert($id,$refers);
       
        $pays_completed= PaysCompleted::getPays($id,$user->range->range,1);
        $total_pays= PaysCompleted::getPays($id,$user->range->range,2);


        $total_refers = Refer::getRefers($id,1);
        $amount = count($refers);

        

        return view('User.dashboard',compact('user','range','sponsor','investments_total','commissions_total','pays_completed','amount','total_refers','total_pays'));

       }





    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $sponsor = Refer::where('user_id',$id)->first();

        return view('User.edit', compact('user','sponsor'));
    }

    public function sh($id)
    {
        $user = User::findOrFail($id);
        $sponsor = Refer::where('user_id',$id)->first();

        return view('User.show', compact('user','sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request)
    {
        $pass= Hash::make($request->password);

        $request->merge(
            [

                'password' => $pass
            ]
            );

        $data_temp = $request->all();
        $user = User::findOrFail(Auth::id());

       
        
        $user->fill($data_temp);
        $user->save();
        return redirect()->action('UserController@show',Auth::id());





    }


}
