<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class PaysController extends Controller
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
            $users = Pay::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('code_pay', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $users = Pay::with('user')->get();

            // dd($users);

        }
        $amount = count($users);

        return view('Admin.Pays.index', compact('users','amount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;

        return view('Admin.Pays.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pay = new Pay();
        if($pay->validate($request->all())->passes()) {
            $user_id = $request->user_id;


            $request->file('image')->storeAs(
                'public/invest', $user_id . '.' . $request->image->extension()
            );

            Pay::create([
                'user_id' => $user_id,
                'path_image' => $user_id. '.'. $request->image->extension(),
                'code_pay' => $user_id

            ]);
        }
        else{
            $errors = $pay->validate($request->all())->messages()->all();

            return view('Admin.Pays.create',compact('errors'));
        }




        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo= Pay::where('user_id',$id)->latest()->first();


        if(isset($photo->path_image))
        {

            $image = $photo->path_image;
            return view('Admin.Pays.show',compact('image'));
        }

        return redirect('admin/users');
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
        Pay::destroy($id);

        return redirect('admin/pays')->with('flash_message', 'User deleted!');
    }
}
