<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use NCUPortal\NCUPortal;
use Auth;

class PortalController extends Controller
{
  public function __construct()
  {

  }

  public function loginportal()
  {
    // Set up NCUPortal with your application's domain
    $ncuPortal = new NCUPortal(route('index'));
    // Get Auth URL with call back url
    $url = $ncuPortal->getAuthUrl(route('loging.portal.back'));
    return redirect($url);
  }

  public function portalback(Request $request)
  {
    // Set up NCUPortal with your application's domain
    $ncuPortal = new NCUPortal(route('index'));
    // Check if callback is validate or not
    // One time used. Second call will be false
    if($ncuPortal->checkLoginValidate())
    {
      // get login account
      $portalaccount = $ncuPortal->getLoginAccount();
      $request->session()->put('portalaccount', $portalaccount);
      return redirect(route('hw1'));
    }
    else
    {
      echo "Login is not real >_<";
    }
  }

  public function logoutportal(Request $request)
  {
    $request->session()->forget('portalaccount');
    $request->session()->forget('m');
    $request->session()->forget('n');
    return redirect(route('hw1'));
  }

  public function portallogout(Request $request)
  {
    return redirect('https://portal.ncu.edu.tw/logout');
  }
}
