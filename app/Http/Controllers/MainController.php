<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use Carbon\Carbon;

class MainController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    $user = Auth::user();
    return View('index');
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
    $users = DB::select('select * from users where account = ?', [$input['account']]);
    if($users != null)
    {
      //$pw = Hash::make($input['password']);
      $pw = md5($input['password']);
      if($pw == $users[0]->password)
      {
        Auth::login($users[0]->password);
        return redirect('index');
      }
      else
      {
        return redirect('login');
      }
    }
    else
    {
      return redirect('login');
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect('index');
  }

  public function signup()
  {
    return View('signup');
  }

  public function signuptoDB(Request $request)
  {
    $input = $request->all();
    $user = DB::select('select * from users where account = ?', [$input['account']]);
    if($user == null)
    {
      if($input['password'] == $input['checkpassword'])
      {
        //$pw = Hash::make($input['password']);
        $pw = md5($input['password']);
        $time = Carbon::now();
        DB::insert('insert into users (account, password, username, email, created_at) values (?, ?, ?, ?, ?)', [$input['account'], $pw, $input['username'], $input['email'], $time]);
        return redirect('index');
      }
      else
      {
        return redirect('signup');
      }
    }
    else
    {
      return redirect('signup');
    }
  }

  public function mul(Request $request)
  {
    $input = $request->all();
    $m = $input['m'];
    $n = $input['n'];
    $request->session()->put('m', $m);
    $request->session()->put('n', $n);
    return redirect('hw1');
  }
}
