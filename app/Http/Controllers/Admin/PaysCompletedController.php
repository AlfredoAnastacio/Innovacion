<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaysCompleted;
use App\Models\AlertsPays;
use App\Models\Commission;
use Illuminate\Support\Arr;

class PaysCompletedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 60;

        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $pays = PaysCompleted::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('level_pay', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $pays= PaysCompleted::all();

        }
       
      
        
            return view('Admin.Pay.index', compact('pays'));
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
        $requestData = $request->all();
        $user_id = (int) Arr::get($requestData,'user_id');
        $level = Arr::get($requestData,'level_pay');
        $level =(int) substr($level,-1);
        $tree = (int) Arr::get($requestData,'tree');
      
        PaysCompleted::create($requestData);

        
        Commission::where('user_id',$user_id)->where('commission_level',$level)->where('tree',$tree)->update(['commission_type'=>1]);
       
        return redirect('admin/payscompleted');
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
