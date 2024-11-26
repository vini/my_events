<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

  function register(){
      return view('users/register');
  }

  public function registerPost(Request $request)
  {
      $user = new User();

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

      $user->save();

      return back()->with('success', 'Usuário cadastrado com sucesso!');
  }

  public function login()
  {
      return view('users/login');
  }

  public function loginPost(Request $request)
  {
      $credetials = [
          'email' => $request->email,
          'password' => $request->password,
      ];

      if (Auth::attempt($credetials)) {
          return redirect('/user/home')->with('success', 'Login feito com sucesso!');
      }

      return back()->with('error', 'E-mail ou Senha inválida.');
  }

  public function logout()
  {
      Auth::logout();

      return redirect()->route('login');
  }
}