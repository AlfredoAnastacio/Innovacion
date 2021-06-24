<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Refer;
use App\Models\Status;
use App\Models\LiderTreeRange;

use DB;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('User.create');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // dd($request->all());
        $sponsor_id = $request->input('sponsor_id');
        $treeSponsor = 1;

        // if ($sponsor_id != 1) {
            $verified_user = User::where('user_id',$request->sponsor_id)->exists();
        // } else {
            // $verified_user = ;
        // }
        // dd($verified_user);
        if ($verified_user) {

            // if ($sponsor_id != 1) {
                // if (User::where('sponsor_id',$sponsor_id)->exists()) {
                    // dd('grl');
                    if ($this->validator($request->all())->passes()) {

                        $gen_id = rand(1,8000);
                        $verified_id = User::where('user_id', $gen_id)->exists();
                        if ($verified_id) {
                            $gen_id = rand(8000,10000);
                        }
                        $rol = 0;

                        if (empty($sponsor_id)) {
                            $admin = User::where('rol', 1)->first();

                            if (empty($admin)) {
                            $sponsor_id = 0;
                            $rol = 1;
                            }
                        }

                        $lastTree = LiderTreeRange::OrderBy('tree', 'desc')->pluck('code')->last();    //Se obtiene el código de la ultima estructura

                        // Se hace el save del usuario en la tabla LiderTreeRange
                        $liderTreeRanges = new LiderTreeRange();
                        $liderTreeRanges->user_id = $gen_id;
                        $liderTreeRanges->tree = 1;
                        $liderTreeRanges->range = 1;
                        $liderTreeRanges->code = (is_null($lastTree)) ? 1 :  $lastTree + 1;
                        $liderTreeRanges->save();

                        $codeTreeSponsor = 0;

                        if ($sponsor_id != 1) {
                            // Se válida y se hace save del patrocinador
                            // dd(LiderTreeRange::where('user_id', $sponsor_id)->orderBy('tree', 'desc')->first());
                            $codeSponsor = LiderTreeRange::where('user_id', $sponsor_id)->orderBy('tree', 'desc')->first();
                            $codeTreeSponsor = $codeSponsor->code;  //Se obtiene el código de la estructura del patrocinador
                            $lastTreeSponsor = $codeSponsor->tree; // último número de estructura

                            $sponsorTreeCount = count(User::where('sponsor_id', $sponsor_id)->where('code_tree', $codeTreeSponsor)->get()); // Válida si ya existe el primer nivel (2 usuarios).

                            if ($sponsorTreeCount < 2) {    // Se válida para obtener el mismo o siguiente rango de la estructura del patrocinador
                                $treeSponsor = $lastTreeSponsor;
                                $codeTreeSponsor = $codeTreeSponsor;
                            } else {
                                $treeSponsor = $lastTreeSponsor + 1;

                                $lastTree = LiderTreeRange::OrderBy('tree', 'desc')->pluck('code')->last();    //Se obtiene el código de la ultima estructura

                                $sponsorliderTreeRanges = new LiderTreeRange();
                                $sponsorliderTreeRanges->user_id = $sponsor_id;
                                $sponsorliderTreeRanges->tree = $treeSponsor;
                                $sponsorliderTreeRanges->range = 1;
                                $sponsorliderTreeRanges->code = (is_null($lastTree)) ? 1 :  $lastTree + 1;
                                $sponsorliderTreeRanges->save();

                                $codeTreeSponsor = LiderTreeRange::where('user_id', $sponsor_id)->pluck('code')->last();
                            }
                        }

                        DB::beginTransaction();

                        try {

                            $admin_sponsor = ($request->sponsor_id == 1) ? 1 : 0 ;

                            $request->request->add(['nivel_tree' => 1]); //add nivel tree
                            $request->request->add(['code_tree' => (is_null($codeTreeSponsor)) ? 1 : $codeTreeSponsor]); //add codetree
                            $request->request->add(['range' => 1]); //add range
                            $request->request->add(['refer_by_admin' => 0]); //add refer by admin
                            $request->request->add(['tree_sponsor' => $treeSponsor]); //add refer by admin
                            $request->request->add(['state' => ($admin_sponsor == 0) ? 'Inactivo' : 'Activo']); //add range

                            event(new Registered($user = $this->create($request->all(), $gen_id, $rol)));

                            $this->guard()->login($user);

                            DB::commit();

                        }catch (\PDOException $e){
                            
                            DB::rollBack();
                            return view('User.create');
                        }

                    } else {
                        $errors = $this->validator($request->all())->messages()->all();
                        return view('User.create',compact('errors'));
                    }
                // }
            // }
        } else {

            $error_sponsor = 'El código de patrocinador no existe';

            return view('User.create',compact('error_sponsor'));
        }

        return view('Pages.GreetingRegister');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered($user_id,$range, $admin_sponsor) {

        $status = new Status();
        $status->user_id =$user_id;
        $status->state = ($admin_sponsor == 0) ? 'Inactivo' : 'Activo' ;
        $status->range = $range;
        $status->save();
    }
}
