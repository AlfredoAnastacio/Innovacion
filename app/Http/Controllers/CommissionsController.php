<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\Refer;
use App\Models\Investment;
use App\Models\Commission;
use App\Models\Cicle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CommissionsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->action('CommissionsController@store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user = Auth::id();
        $refers = Refer::getRefers($user,2);
        
        if(Refer::where('user_id',$user)->first() == NULL)
        {
            Refer::create(['user_id'=> $user, 'sponsor_id' => 1]);
        }

       
        $levels = count($refers);  //Cantidad de Referidos por nivel
        $investments = Investment::getInvestments($refers,$levels);



        if(isset($investments) && isset($refers))
        {


              
                Commission::selfCommissions($investments,$levels,$user);
              


        }
        
            
        return redirect()->action('StatusController@show',Auth::id());
        }

        /**
         * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


}
