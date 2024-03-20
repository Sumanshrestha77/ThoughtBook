<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingData = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email'=> ['required', 'email', Rule::unique('users','email')],
            'password'=> ['required', 'min:8', 'max:200']
        ]);
        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout(); //auth() is globally available funtion. 
        return redirect('/');
    }
    public function login(Request $request){
      $incomingFeild= $request->validate([
        'loginname'=>'required',
        'loginpassword'=> 'required'
      ]);
      if(auth()->attempt(['name'=>$incomingFeild['loginname'], 'password' => $incomingFeild['loginpassword']])){
        $request->session()->regenerate();
      }

      return redirect('/');
    }
}
