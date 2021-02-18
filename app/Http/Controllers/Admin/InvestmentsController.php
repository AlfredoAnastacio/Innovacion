<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Range;
use Illuminate\Http\Request;
use App\Models\Investment;

class InvestmentsController extends Controller
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
            $investments = Investment::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $investments = Investment::with('user')->get();

        }
        $amount = count($investments);
        return view('Admin.Investments.index', compact('investments','amount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;
        $state = Status::where('user_id',$user_id)->first()->range;
        $pay = Range::where('range_id',$state)->first()->total_investment;
      
        $verified_investment = Investment::where('user_id',$request->user_id)->where('pay',$pay)->latest()->exists();

        if($verified_investment)
        {

            return redirect()->action('Admin\InvestmentsController@edit', [$request->user_id]);
        }


        return view('Admin.Investments.create',compact('pay','user_id'));
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

        $range_id = Status::where('user_id',$request->user_id)->first()->range;
        $range = Range::where('range_id',$range_id)->first();    
        $range_name = $range->range;
       $requestData= array_merge($requestData, ['state' => $range_name]);


        $verified_investment = Investment::where('user_id',$request->user_id)->where('state',$range_name)->latest()->exists();
        if(!$verified_investment)
        {

            Investment::create($requestData);
        }

        return redirect()->action('StatusController@show', [$request->user_id]);


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
        $user_id=$id;
        $investment = Investment::findOrFail($user_id);
        $state = Status::where('user_id',$user_id)->first()->range;
        $pay = Range::where('range_id',$state)->first()->total_investment;
    

        return view('Admin.Investments.edit', compact('investment','user_id','pay'));
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
        $user = Investment::findOrFail($id);
        $user->update($requestData);

            return redirect('admin/investments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Investment::destroy($id);

        return redirect('admin/investments')->with('flash_message', 'User deleted!');
    }
}
