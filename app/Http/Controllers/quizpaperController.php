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



    public function viewquizp()
    {




        $inputt = Input::get('quiz');
        $question = DB::table('addquiz', 'exam')

            ->where('addquiz.quizID', '=', $inputt)
            ->join('exam', 'addquiz.quizID', '=', 'exam.quizID')->get();

        return view('quizpaper')
            ->with('quizpaper', exam::all())
            ->with('question', $question);


    }

    public function attempt()
    {


        $inputt = Input::get('quiz');
        $question = DB::table('addquiz')

            ->where('quizID', '=', $inputt)->get();
        return view('attemptquiz')
            ->with('question', $question);



    }


    public function searchInventory()

    {



        $inputt = Input::get('quiz');
        $input = Input::get('subject');
        $results = DB::table('addquiz', 'quiz')


            ->where('addquiz.quizID', '=', $inputt)
            ->where('exam.subject', '=', $input)
            ->join('quiz', 'addquiz.queID', '=', 'quiz.queID')
            ->join('exam', 'addquiz.quizID', '=', 'exam.quizID')->get();


        return View::make('attemptquiz')
            ->with('results', $results);



    }


}