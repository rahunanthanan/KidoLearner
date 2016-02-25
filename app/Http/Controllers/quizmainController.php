<?php namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use  Request;
use View;
use Mail;
use App\addnewcourse;
use Illuminate\Support\Facades\Hash;
use App\saveas;

class quizmainController extends Controller
{


    /***********get contact page view***********/
    public function getmain()
    {

        return View::make('quizmain');

    }


}