<?php namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use  Request;
use View;
use Mail;
use App\addnewcourse;
use Illuminate\Support\Facades\Hash;
use App\saveas;

/**
 * Class quizmainController
 * @package App\Http\Controllers
 *
 * Manage quiz
 */

class quizmainController extends Controller
{




    public function getmain()
    {

        return View::make('quizmain');

    }


}