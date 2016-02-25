<?php namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\subject;
use  Request;
use View;
use Mail;
use App\addnewcourse;
use Illuminate\Support\Facades\Hash;
use App\saveas;

class managesubController extends Controller
{


    /***********get contact page view***********/
    public function getmanage()
    {

        return View::make('managesub')
            ->with('subjects', subject::all());

    }


}