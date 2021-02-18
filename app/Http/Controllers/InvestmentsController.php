<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InvestmentsController extends Controller
{
    

    public function show($user_id)
    {
       if($user_id == Auth::id())
       {
       $investments= User::where('user_id',$user_id)->with('investments')->get();   //Muestra las inversiones, que fueron validadas despues del pago

       return view('Investments.show',compact('investments'));
         }

         return back();
    }

}
