<?php namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\quiz;
use App\subject;
use  Request;
use View;
use Mail;
use App\addnewcourse;
use Illuminate\Support\Facades\Hash;
use App\saveas;
use App\photo;
use App\addquiz;
use App\exam;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class quizpaperController extends Controller
{


    /***********get contact page view***********/
    public function viewquizp()
    {


        $question = DB::table('exam', 'addquiz')
            ->join('addquiz', 'addquiz.quizID', '=', 'exam.quizID')->get();

             return view('quizpaper')
            ->with('quizpaper', exam::all())
            ->with('question', $question);


    }



}