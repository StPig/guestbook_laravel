<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\Message;

class MainController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    $user = Auth::user();
    $messages = Message::all();
    return View('index', ['user' => $user, 'messages' => $messages]);
  }

  public function hw1(Request $request)
  {
    $portalaccount = $request->session()->get('portalaccount');
    $m = $request->session()->get('m');
    $n = $request->session()->get('n');
    return View('hw1', ['portalaccount' => $portalaccount,'m' => $m, 'n' => $n]);
  }

  public function login()
  {
    return View('login');
  }

  public function logincheck(Request $request)
  {
    $input = $request->all();
    $user = User::where('account', '=', $input['account'])->first();
    if($user != null)
    {
      if(Hash::needsRehash($user->password))
      {
        $pw = Hash::make($user->password);
        $user->password = $pw;
        $user->save();
      }
      if(Hash::check($input['password'], $user->password))
      {
        Auth::login($user);
        return redirect(route('index'));
      }
      else
      {
        return redirect(route('login'));
      }
    }
    else
    {
      return redirect(route('login'));
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect(route('index'));
  }

  public function signup()
  {
    return View('signup');
  }

  public function signuptoDB(Request $request)
  {
    $input = $request->all();
    $user = User::where('account', '=', $input['account'])->first();
    if($user == null)
    {
      if($input['password'] == $input['checkpassword'])
      {
        $pw = Hash::make($input['password']);
        $user = new User;
        $user->account = $input['account'];
        $user->password = $pw;
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->save();
        return redirect(route('index'));
      }
      else
      {
        return redirect(route('signup'));
      }
    }
    else
    {
      return redirect(route('signup'));
    }
  }

  public function mul(Request $request)
  {
    $input = $request->all();
    $m = $input['m'];
    $n = $input['n'];
    $request->session()->put('m', $m);
    $request->session()->put('n', $n);
    return redirect(route('hw1'));
  }
}
