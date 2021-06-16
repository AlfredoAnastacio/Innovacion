<?php

namespace Illuminate\Foundation\Auth;
use App\Models\Refer;
use App\Models\Status;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

        if ($sponsor_id != 1) {
            $verified_user = User::where('user_id',$request->sponsor_id)->exists();
        } else {
            $verified_user=[1];
        }


        if ($verified_user) {

            if ($sponsor_id != 1) {

                if (Refer::where('sponsor_id',$sponsor_id)->exists()) {
                    $sponsorTree = Refer::where('sponsor_id',$sponsor_id)->orderBy('tree_sponsor','desc')->first();
                    $sponsors = Refer::where('sponsor_id',$sponsor_id)->where('tree_sponsor',$sponsorTree->tree_sponsor)->get();

                    $total = sizeof($sponsors);
                    if ($total < 2) {
                        $treeSponsor = $sponsorTree->tree_sponsor;
                    } else {
                        $treeSponsor = $sponsorTree->tree_sponsor + 1;
                    }
                }
            }
        } else {
            $error_sponsor = 'El código de patrocinador no existe';
            return view('User.create',compact('error_sponsor'));
        }

        if ($this->validator($request->all())->passes()) {
            // $refers = Refer::getRefers($id,0,$t);
            $sponsor = new Refer();
            $gen_id = rand(1,8000);
            $verified_id = User::where('user_id','=',$gen_id)->exists();
            if ($verified_id) {
                $gen_id = rand(8000,10000);
            }
            $rol = 0;

            if (empty($sponsor_id)) {
                $admin = User::where('rol',1)->first();

                if (empty($admin)) {
                   $sponsor_id = 0;
                   $rol = 1;
                }
            }

            $admin_sponsor = ($request->sponsor_id == 1) ? 1 : 0 ;
            $range = Status::where('user_id',$request->sponsor_id)->first()->range;
            $request->request->remove('sponsor_id');
            $validate = Refer::where('user_id',$gen_id)->exists();

            if (!$validate) {
                $sponsor->user_id = $gen_id;
                $sponsor->tree_sponsor = $treeSponsor;
                $sponsor->sponsor_id = $sponsor_id;
                $sponsor->save();
            }

            event(new Registered($user = $this->create($request->all(),$gen_id,$rol)));

            $this->guard()->login($user);

            $this->registered($gen_id,$range, $admin_sponsor);
        } else {
            $errors = $this->validator($request->all())->messages()->all();
            return view('User.create',compact('errors'));
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
