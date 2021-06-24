<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\User;

class StatusController extends Controller
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
            $status = Status::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $status = User::join('ranges', 'users.range', 'ranges.range_id')
                            ->select('users.user_id', 'users.state', 'users.document', 'users.name', 'users.telephone', 'ranges.range as nameRange')
                            ->get();
        }
        $amount = count($status);

        return view('Admin.Status.index', compact('status','amount'));
    }

    public function inactive(Request $request) {

        $users = User::where('state', 'Inactivo')->get();

        return view('Admin.Status.userInactives', compact('users'));
    }


    public function active(Request $request)
    {

        $perPage = 25;

        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $status = Status::where('user_id', 'LIKE', "%$keyword%")->where('state','Activo')
                ->orWhere('user_id', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $status = Status::where('state','Activo')->with('user','range')->get();

        }
        $amount = count($status);

        return view('Admin.Status.index', compact('status','amount'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        return view('Admin.Status.create');
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
       $range = Status::getRange($requestData);


      Status::create(array_merge($requestData,['range' => $range]));

        return redirect('admin/status')->with('flash_message', 'User added!');
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
        $state = Status::findOrFail($id);

        return view('Admin.Status.edit', compact('state'));
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
        $range = Status::getRange($requestData);
        $state = Status::findOrFail($id);


        $state->update(array_merge($requestData,['range' => $range]));

            return redirect('admin/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       Status::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
