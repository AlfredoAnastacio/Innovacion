<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Refer;
use App\User;

class RefersController extends Controller
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
            $refers = Refer::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('sponsor_id', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $refers = Refer::with('user','sponsor')->get();
        }

        $amount = count($refers);
        return view('Admin.Refers.index', compact('refers','amount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user_id = $request->user_id;

        $verified_sponsor = Refer::where('user_id',$user_id)->exists();

        if($verified_sponsor)
        {
            $id = Refer::where('user_id',$user_id)->first()->id;
            return redirect('admin/refers/'.$id . '/edit');
        }

        return view('Admin.Refers.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestData =  (array_merge($request->all(), ['refer_by_admin' => 1,

        ]));

        $verified_user = User::where('user_id',$request->sponsor_id)->exists();
        $verified_refers = 0;

        if($verified_user)
        {


        if($request->sponsor_id != 1)
        {

            if(Refer::where('sponsor_id',$request->sponsor_id)->exists())
            {
                $sponsorTree = Refer::where('sponsor_id',$request->sponsor_id)->orderBy('tree_sponsor','desc')->first();
                $sponsors = Refer::where('sponsor_id',$request->sponsor_id)->where('tree_sponsor',$sponsorTree->tree_sponsor)->get();

                $total = sizeof($sponsors);
                if($total < 2)
                {
                    $treeSponsor = $sponsorTree->tree_sponsor;

                }

                else{

                    $treeSponsor = $sponsorTree->tree_sponsor + 1;


                }


            }

        }

        else{
            $verified_sponsor=1;
        }


        $requestData =  (array_merge($request->all(), ['tree_sponsor' => $treeSponsor,

        ]));

        $verified_sponsor = Refer::where('user_id',$request->user_id)->exists();

        if(!$verified_sponsor)
        {
            Refer::create($requestData);

        }

        else
        {

            if(isset( Refer::where('user_id',$request->user_id)->first()->id))
            {

                $id = Refer::where('user_id',$request->user_id)->first()->id;
                return redirect('admin/refers/'.$id . '/edit');
            }

        }

        return redirect('admin/users');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {


        $id = $user_id;
        $refers = Refer::getRefers($id, 0);

        $amount = count($refers);
        $array = array();
        $aux = collect();
        for ($i = 1; $i <= $amount; $i++) {
            foreach ($refers[$i] as $user)
            {
                if (isset($user->user->name)) {

                    $name = $user->user->name;

                     $aux= $aux->push($name);
                }

            }

            $array[$i] = $aux;
    }

        $array = json_encode($refers);


        return view('Admin.Tree', compact('array','amount'));

        //return view('Admin.Refers.show',compact('refers','amount'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $refer = Refer::findOrFail($id);

        $name = User::where('user_id',$refer->user_id)->first()->name;
        $name_sponsor = User::where('user_id',$refer->sponsor_id)->first()->name;

        return view('Admin.Refers.edit', compact('refer','name','name_sponsor'));
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

        $verified_sponsor = User::where('user_id',$request->sponsor_id)->exists();

        if($request->sponsor_id ==1)
        {
            $requestData = $request->all();
             $user = Refer::findOrFail($id);
             $user->update($requestData);
        }

        else{


            if($verified_sponsor)
            {
                $sponsorTree = Refer::where('sponsor_id',$request->sponsor_id)->orderBy('tree_sponsor','desc')->first();
                $sponsors = Refer::where('sponsor_id',$request->sponsor_id)->where('tree_sponsor',$sponsorTree->tree_sponsor)->get();

                $total = sizeof($sponsors);
                if($total < 2)
                {
                    $treeSponsor = $sponsorTree->tree_sponsor;

                }

                else{

                    $treeSponsor = $sponsorTree->tree_sponsor + 1;


                }


                $requestData =  (array_merge($request->all(), ['tree_sponsor' => $treeSponsor,

                ]));





                    $requestData = $request->all();
                    $user = Refer::findOrFail($id);
                    $user->update($requestData);



            }
    }


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
        Refer::destroy($id);

        return redirect('admin/refers')->with('flash_message', 'User deleted!');
    }
}
