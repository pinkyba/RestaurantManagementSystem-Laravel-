<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo(){
        $roles = auth()->user()->getRoleNames();
        //print($roles[0]);
        // Check user role
        switch ($roles[0]) {

            case 'admin':
                return '/dashboard';  // call with url address '/dashboard'
                break;

            case 'vendor':
                return '/vendordashboard';  // call with url address '/dashboard'
                break;

            case 'waiter':
                return '/waiterdashboard';  // call with url address '/dashboard'
                break;

            case 'chef':
                return '/chefdashboard';  // call with url address '/dashboard'
                break;

            case 'barcounterstaff':
                return '/barcounterstaffdashboard';  // call with url address 
                break;

            case 'cashier':
                return '/cashierdashboard';  // call with url address '/dashboard'
                break;
            
            default:
                return '/';  // call with url address '/dashboard'
                break;
        }
    }
}
