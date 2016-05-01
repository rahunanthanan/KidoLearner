<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use App\User;
use Session;
use Mail;

class AdminController extends Controller
{
    function getViewAdminPage()
    {
        ini_set('xdebug.max_nesting_level', 200);
        return view('Admin');

    }
}
