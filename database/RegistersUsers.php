<?php

namespace Illuminate\Foundation\Auth;
// use App\Models\Refer;
// use App\Models\Status;
use App\Models\Contract;
use App\Models\Contract_to_user;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        $contract_id = $request->input('contract_id');
        $range = 1;
        $status_contract = 0;

        if ($contract_id == 0) {
            $verified_contract = User::where('contract', $contract_id)->exists();
            $sponsor_id = User::where('contract', 0)->pluck('user_id')->first();
            $request->merge(["sponsor_id" => $sponsor_id]);
        }

        if ($contract_id != 0) {
            $verified_contract = Contract::where('contract', $contract_id)->exists();
            $sponsor_id = Contract::where('contract', $contract_id)->pluck('user_id')->first();
            $request->merge(["sponsor_id" => $sponsor_id]);
        }

        if ($verified_contract) {

            $limit_contract = count(User::where('contract', $contract_id)->get());
            // dd($limit_contract);
            if ($limit_contract > 2) {

                $error_sponsor = 'El número de contrato ya no es válido, solicite uno nuevo';

                return view('User.create',compact('error_sponsor'));
            }else{

                //Generando el id aleatorio del user con validación si ya existe en tabla
                $gen_id = rand(1,8000);
                $verified_id = User::where('user_id','=',$gen_id)->exists();
                if ($verified_id) {
                    $gen_id = rand(8000,10000);
                }
                $rol = 0;
                // if ($contract_id == 0) {
                    if ($this->validator($request->all())->passes()) {


                        DB::beginTransaction();

                        try {

                            $gen_contract_id = rand(1,8000);
                            $verified_contract_id = Contract::where('contract', $gen_contract_id)->exists();
                            if ($verified_contract_id) {
                                $gen_contract_id = rand(8000,10000);
                            }

                            $contract = new Contract();
                            $contract->user_id = $gen_id;
                            $contract->contract = $gen_contract_id;
                            $contract->status_contract = $status_contract;
                            $contract->range_id = $range;
                            $contract->save();

                            if ($contract_id == 0) {
                                $contract_id = Contract::where('user_id', $gen_id)->pluck('contract')->first();;
                                $request->merge(["contract" => $contract_id]);
                            } else {
                                $request->merge(["contract" => $contract_id]);
                            }

                            event(new Registered($user = $this->create($request->all(),$gen_id,$rol)));

                            $this->guard()->login($user);

                            DB::commit();
                        }catch (\PDOException $e){

                            DB::rollBack();
                            $errors = array($errors = $e);

                            return view('User.create',compact('errors'));
                        }
                    } else {
                        $errors = $this->validator($request->all())->messages()->all();
                        return view('User.create',compact('errors'));
                    }
                // } else {

                //     DB::beginTransaction();

                //         try {

                //             $sponsor_id = Contract::where('contract', $contract_id)->pluck('user_id')->first();
                //             $request->merge(["sponsor_id" => $sponsor_id]);
                //             $request->merge(["contract" => $contract_id]);

                //             event(new Registered($user = $this->create($request->all(),$gen_id,$rol)));

                //             $contract_to_user = new Contract_to_user();
                //             $contract_to_user->user_id = $gen_id;
                //             $contract_to_user->sponsor_id = $sponsor_id;
                //             $contract_to_user->contract = $contract_id;
                //             $contract_to_user->save();

                //             $this->guard()->login($user);

                //             DB::commit();
                //         }catch (\PDOException $e){

                //             DB::rollBack();
                //             $errors = array($errors = $e);

                //             return view('User.create',compact('errors'));
                //         }
                // }
            }
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
