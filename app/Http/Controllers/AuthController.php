<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request){
        if($request->method() == 'POST'){
            $user = User::create([
                'login'=>$request['login'],
                'password'=>bcrypt($request['password'])
            ]);
            if($user){
                return redirect('/');
            }
        }
        return view('register');
    }
    public function login(Request $request){
        if($request->method() == 'POST'){
            
            $credentials = $request->only('login','password');
            if(Auth::attempt($credentials)){
                return redirect('/');
            }
            return view('login',['message'=>'Неверный логин или пароль']);
        }
        return view('login');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}