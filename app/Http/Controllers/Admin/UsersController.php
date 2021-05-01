<?php


//Controla la modificacíón de cada usuario y actualiza la información de cada uno
//Acoplado al CRUD (CREATE,REGISTER,UPDATE,DELETE)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Alerts;
use App\Models\AlertsPays;
use App\Models\Status;
use App\Models\Refer;
use App\Models\Refresh\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */


    public function index(Request $request) //Lista todos los usuarios (Establecidad para sólo administrador)
    {


        $keyword = $request->get('search');
        $perPage = 50;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('lastname', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        } else {
            // $users = User::all();
            $users = User::join('refers', 'users.user_id', 'refers.user_id')
                        ->join('status', 'users.user_id', 'status.user_id')
                        ->get();
            // dd(count($users));
            for ($i=0; $i < count($users); $i++) {  //Se obtiene la cantidad de referidos
                $totalRefers = Refer::where('sponsor_id', $users[$i]->user_id)->orderBy('tree_sponsor','desc')->count();
                $totalTree = Refer::where('sponsor_id', $users[$i]->user_id)->orderBy('tree_sponsor','desc')->first();
                $users[$i]->totalRefers = $totalRefers;
                $users[$i]->totalTree = $totalTree['tree_sponsor'];
            }
            // dd($users);
        }

        $alerts_pays=AlertsPays::where('status_pay','Sin pagar')->latest()->first();
        $alerts=Alerts::latest()->first();
        if ($alerts != NULL || $alerts_pays != NULL) {
            $alerts = 1;
        } else {
            $alerts = 0;
        }

        return view('Admin.User.index', compact('users','alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = new User();

        if($user->validate($request->all())->passes())
        {
            $gen_id = rand(1,7000);
            $pass = Hash::make($request->password);




        $user->create(array_merge($request->all(), ['user_id' => $gen_id,
            'rol' => 0,
            'password' => $pass
        ]));


        }


        else{
            $errors = $user->validate($request->all())->messages()->all();
            return view('Admin.User.create',compact('errors'));
        }



        DB::table('status')->insert
          (
            ['user_id' => $gen_id,
                'state' => "Inactivo",
            'range' => 1]

        );

        return redirect('admin/users')->with('flash_message', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($document) //Función modificada (GET|HEAD  | users/{user} ) para que se enrute hacia un panel de Visualización del usuario y actualize la información
    {
            //Actualiza el estado del usuario según la última fecha de inversión



        $get_user=Auth::user()->document;
        $get_last_pay=Pay::latest()->findOrFail($get_user)->created_at;


            $user = User::findOrFail($document);

            return view('users.show', compact('user'));

            //Vista "Resumen"



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) //Edita el usuario
    {


            $user = User::findOrFail($id);

            return view('Admin.User.edit', compact('user'));




    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $document) //Actualiza la información editada del usuario por la función edit
    {

        $requestData = $request->all();

        $user = User::findOrFail($document);
        $user->update($requestData);

            return redirect('admin/users');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) //Función eliminar usuario, únicamente desde el Administrador
    {

        User::destroy($id);
        Status::where('user_id',$id)->delete();

        Refer::where('user_id',$id)->delete();


        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }

    public function upgrade()
    {

        $users= User::all();

        foreach ($users as $user)
        {

            Update::refreshCommission($user->user_id);

        }

        return redirect('admin/users');
    }
}
