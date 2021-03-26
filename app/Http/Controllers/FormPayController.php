<?php

namespace App\Http\Controllers;

use App\FormPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Storage;

class FormPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()


    {
        $user_id = Auth::id();
        $contents = Storage::disk('local')->get('banks.json');
        $contents= json_decode($contents);
        $length = count($contents);

  
        return view('User.datapay',compact('contents','length','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        FormPay::create($requestData);
        return view('User.dashboard');
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

            $user = $id;
            $formComprobation = FormPay::where('user_id', $id)->exists();
            if($formComprobation)
            {

                $data = FormPay::where('user_id', $id)->first();
                return view('User.paydashboard',compact('user','data'));
            }

            else{

                return redirect()->action('FormPayController@create');
            }


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
        $user = FormPay::findOrFail($id);
        $contents = Storage::disk('local')->get('banks.json');
        $contents= json_decode($contents);
        $length = count($contents);
        return view('User.editpaychannel', compact('user','contents','length'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $requestData = $request->all();
             $user = FormPay::findOrFail($id);

             $user->update($requestData);

             return redirect("payform/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
