<?php

namespace AuthEdge\Http\Controllers\Auth;

use Illuminate\Http\Request;
use AuthEdge\Http\Requests;
use AuthEdge\Http\Controllers\Controller;
use \Carbon\Carbon;

/**
 * Account Controller
 * 
 * @package AuthEdge
 * @subpackage Laravel
 * @version 1.0
 */ 
class ApiAuthController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
    /**
     * Responds to requests to add /accounts
     * 
     * @return \Illuminate\Http\Response
     */
    public function postLogin( Request $request ){
        // log
        $context = ['context'=>'ApiAuthController::'.__FUNCTION__];

        $error = ['status'=>'error','message'=>'You missed the email or password input.'];
        
        if( $request->has('email') && $request->has('password') ){

            if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], 'remember')){

                $user = \Auth::user();

                $user->login_at = Carbon::now();
                $user->login_token = str_random(32);
                $user->save();

                $error = ['status'=>'success','message'=>'Login successful','user'=>$user];
                
            }else{
                $error = ['status'=>'error','message'=>'These credentials do not match our records.'];
            }
        }    

        return response()->json( $error );
    } 

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function anyLogout( Request $request )
    {
        $error = ['status'=>'error','message'=>'You missed the email input.'];

        if( $request->has('email') ){

            $user = \AuthEdge\User::where('email','=', $request->get('email'))->first();

            if(!empty($user)){

                $user->logout_at = Carbon::now();
                $user->login_token = null;
                $user->save();

                $error = ['status'=>'success','message'=>'Logout successful'];
            
            }else{

                $error = ['status'=>'error','message'=>'These credentials do not match our records.'];
                
            }     
        }      

        return response()->json( $error );
    }
}

    
