<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Refer;
use App\Models\AlertsPays;

class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $user = User::where('user_id', $id)->first();
        $sponsor_id = Refer::where('user_id', $id)->pluck('sponsor_id')->first();
        $user->sponsor_id = $sponsor_id;

        // Total de estructuras
        $sponsorTree = Refer::where('sponsor_id',$id)->orderBy('tree_sponsor','desc')->first();
        if ($sponsorTree == NULL) {
            $sponsorTree = 1;
        } else {
            $sponsorTree = $sponsorTree->tree_sponsor;
        }
        $user->sponsorTree = $sponsorTree;

        // Tabla alerts_pays - movements
        $data = AlertsPays::where('user_id', $id)->get();
        if ($data->isEmpty()) {
            $data = 0;
        } else {
            foreach ($data as $value) {
                $value->date = $value->created_at->format('d-m-y');
            }
        }

        return view('User.movements', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
