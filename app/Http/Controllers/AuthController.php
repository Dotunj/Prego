<?php

namespace Prego\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Prego\User;

class AuthController extends Controller
{
    public function getRegister()
    {
      return view('auth.register');
    }
public function getLogin()
{
  return view('auth.login');
}
 
public function postRegister(Request $request)
{
  $this->validate($request, [
   'email'=> 'required|unique:users|email|max:255',
   'username'=>'required|unique:users|alpha_dash|max:20',
   'password'=> 'required|min:6'
]); 

 User::create([
      'email'=>$request->input('email'),
      'username'=>$request->input('username'),
      'password'=>bcrypt($request->input('password'))
]);
  return redirect('index')->with('info', 'Your account has been created and you can now sign in');


}

  public function postLogin(Request $request)
  {
     $this->validate($request, [
        'email'=>'required',
        'password'=>'required'
   ]);

   $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));
   if(!$authStatus){
        return redirect()->back()->with('warning', 'Invalid Email or Password');

   }

   return redirect()->route('projects.index')->with('info', 'You are now signed in');

  }

  public function logout()
  {

    Auth::logout();

    return redirect('index')->with('info', 'Log out Successful');
  }

}
