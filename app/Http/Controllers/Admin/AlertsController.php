<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alerts;

class AlertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 25;

        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $alerts = Alerts::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('alert_type', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $alerts= Alerts::latest()->paginate($perPage);

        }
       
      
        
            return view('Admin.Alerts.index_refer', compact('alerts'));

        
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
        $alert = Alerts::findOrFail($id);

        return view('Admin.Alerts.edit', compact('alert'));
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

        $alert = Alerts::findOrFail($id);
        $alert->update($requestData);

            return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alerts::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
