<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSponsor;
use App\Models\User;
use App\Models\Refer;
use App\Models\Status;
use App\Models\Range;
use App\Models\PaysCompleted;
use App\Models\Investment;
use App\Models\Commission;
use App\Models\Alerts;
use App\Models\AlertsPays;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RefersController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $id = Auth::id();

        $data_user = User::where('user_id', $id)->first();
        $sponsor_id = $data_user->sponsor_id;


        if ($sponsor_id == 1) {
            $contract_sponsor = User::where('user_id', 1)->pluck('contract')->first();
        } else {
            $contract_sponsor = $data_user->contract;
        }


        return view('User.tree', compact('contract_sponsor'));
    }

    public function create() {
        $validate = Refer::where('user_id',Auth::id())->exists();
        if (!$validate) {
            return view('Refers.create');
        }

        return redirect()->action('RefersController@show',Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     *Agrega el Patrocinador
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validate = Refer::where('user_id',Auth::id())->exists();

        if (!$validate) {
            $range = Status::where('user_id',$request->sponsor_id)->first()->range;

            $refer = new Refer();
            $refer->user_id =  Auth::id();
            $refer->sponsor_id = $request->sponsor_id;
            DB::table('status')->where('user_id',$request->user_id)->update(['range' => $range]);
            $refer->save();
        }

        return redirect()->action('RefersController@show',Auth::id());
    }

    /**
     * Muestra los Referidos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tree) {       //VALIDAR QUE SE USA O SE PUEDE USAR
        $user_id = Auth::id();
        $refers= Refer::getRefers($user_id,0,$tree);
        $levels = count($refers);

        return view('Refers.tree',compact('refers','tree'));
    }

    public function link($referralCode) {

        return view('User.create',compact('referralCode'));
    }

    public function detail($tree){

        $user_id = Auth::id();
        $refers = Refer::getRefers($user_id,0,$tree);
        $range_lider = Status::where('user_id', $user_id)->pluck('range')->first();

        foreach ($refers as $refer) {
            foreach ($refer as $value) {
                $name_sponsor = User::where('user_id', $value->sponsor_id)->pluck('name')->first();
                $value->name_sponsor = strtoupper($name_sponsor);
                $num_users = Refer::where('sponsor_id', $value->user_id)->get();
                $value->num_users = count($num_users);
                $name = User::where('user_id', $value->user_id)->pluck('name')->first();
                $value->name = strtoupper($name);

                // APARTADO PARA OBTENER EL NIVEL DEL USUARIO DENTRO DE LA ESCTRUCTURA
                $flag_admin = false;
                while ($flag_admin == false) {
                    $nivel = 1;     // NIVEL 1
                    $next_sponsor = Refer::where('user_id', $value->sponsor_id)->pluck('sponsor_id')->first();
                    if ($next_sponsor == 1) {
                        $flag_admin = true;
                    } else {
                        $nivel = $nivel + 1;    // NIVEL 2
                        $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                        if ($next_sponsor == 1) {
                            $flag_admin = true;
                        } else {
                            $nivel = $nivel + 1;    // NIVEL 3
                            $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                            if ($next_sponsor == 1) {
                                $flag_admin = true;
                            } else {
                                $nivel = $nivel + 1;    // NIVEL 4
                                $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                if ($next_sponsor == 1) {
                                    $flag_admin = true;
                                } else {
                                    $nivel = $nivel + 1;    // NIVEL 5
                                    $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                    if ($next_sponsor == 1) {
                                        $flag_admin = true;
                                    } else {
                                        $nivel = $nivel + 1;    // NIVEL 6
                                        $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                        if ($next_sponsor == 1) {
                                            $flag_admin = true;
                                        } else {
                                            $nivel = $nivel + 1;    // NIVEL 7
                                            $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                            if ($next_sponsor == 1) {
                                                $flag_admin = true;
                                            } else {
                                                $nivel = $nivel + 1;    // NIVEL 8
                                                $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                if ($next_sponsor == 1) {
                                                    $flag_admin = true;
                                                } else {
                                                    $nivel = $nivel + 1;    // NIVEL 9
                                                    $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                    if ($next_sponsor == 1) {
                                                        $flag_admin = true;
                                                    } else {
                                                        $nivel = $nivel + 1;    // NIVEL 10
                                                        $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                        if ($next_sponsor == 1) {
                                                            $flag_admin = true;
                                                        } else {
                                                            $nivel = $nivel + 1;    // NIVEL 11
                                                            $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                            if ($next_sponsor == 1) {
                                                                $flag_admin = true;
                                                            } else {
                                                                $nivel = $nivel + 1;    // NIVEL 12
                                                                $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                                if ($next_sponsor == 1) {
                                                                    $flag_admin = true;
                                                                } else {
                                                                    $nivel = $nivel + 1;    // NIVEL 13
                                                                    $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                                    if ($next_sponsor == 1) {
                                                                        $flag_admin = true;
                                                                    } else {
                                                                        $nivel = $nivel + 1;    // NIVEL 14
                                                                        $next_sponsor = Refer::where('user_id', $next_sponsor)->pluck('sponsor_id')->first();
                                                                        if ($next_sponsor == 1) {
                                                                            $flag_admin = true;
                                                                        } else {
                                                                            $flag_admin = true;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $value->nivel = $nivel;
            }
        }

        $levels = count($refers);

        $sponsorTree = Refer::where('sponsor_id',$user_id)->orderBy('tree_sponsor','desc')->first();
        if ($sponsorTree == NULL) {
            $sponsorTree =1;
        } else {
            $sponsorTree = $sponsorTree->tree_sponsor;
        }

        $refers_by_tree = array();
        $total_users_by_tree = 0;
        $total_users = 0;
        for ($t=1; $t <= $sponsorTree; $t++) {
            $referes = Refer::getRefers($user_id,0,$t);
            foreach ($referes as $value) {
                foreach ($value as $val) {
                    $total_users_by_tree++;
                }
            }
            array_push($refers_by_tree, $total_users_by_tree);
            $total_users_by_tree = 0;
        }

        foreach ($refers_by_tree as $value) {   //se obtiene el total en general del usuario x.
            $total_users = $total_users + $value;
        }

        return view('Refers.tree',compact('refers','tree', 'levels', 'total_users', 'range_lider'));
    }

    public function detailcontract($id) {
        $id = 1;
        $contract_range = Range::where('range_id', $id)->pluck('range')->first();

        return view('Refers.resumeContracts', compact('contract_range'));
    }
}
