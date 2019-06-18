<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // Als de user Admin is -> naar admin pagina, als user normaal is -> home pagina.
    protected function authenticated($request,$user){
        if($user->type === 'beheer'){
            return redirect()->intended('beheer'); //redirect naar admin paneel beheer
        }
        elseif($user->type === 'web'){
            return redirect()->intended('web'); //redirect naar admin paneel web
        }else

        return redirect()->intended('home'); //redirect naar standard homepagina / storingen
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
