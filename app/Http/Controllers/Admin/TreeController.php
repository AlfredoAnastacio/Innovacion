<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TreeController extends Controller
{
    

    public function show()
    {
        $id = Auth::id();
        $users = User::all();

        $amount = count($users);
        $array = array();
        $aux = collect();
        for ($i = 1; $i <= $amount; $i++) {
            foreach ($users as $user)
            {
                if (isset($user->name)) {

                    $name = $user->name;

                     $aux= $aux->push($name);
                }

            }

            $array[$i] = $aux;
    }

        $array = json_encode($users);

        return view('Admin.Tree', compact('array','amount'));

    }
}
