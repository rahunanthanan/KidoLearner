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
class createquizController extends Controller
{


    /***********get contact page view***********/
    public function viewque()
    {



        return view('createquiz')
            ->with('questions', quiz::all())
            ->with('subject', subject::all())
            ->with('quizs', exam::all());


    }


    public function createquiz()

    {

        $button = Input::get('btn');
        if ($button == 'Submit') {


            $rules = array(

                'subject' => 'required',
                'duration' => 'required'


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('createquiz')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            } else {
                $form = new exam();
                $form->subject = Input::get('subject');
                $form->duration = Input::get('duration');


                $form->save();


            }

            return Redirect::to('createquiz')->with('message2', 'Successfully ADD!');
        }


    else{

        $rules = array(

            'question' => 'required',
            'answer' => 'required'


        );

        $validator = Validator::make(Input::all(), $rules);//checking validation rules

        if ($validator->fails()) {
            return Redirect::to('createquiz')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
        } else {
            $form = new addquiz();
            $form->quizID = Input::get('id');
            $form->queID = Input::get('quID');
            $form->question = Input::get('question');
            $form->answer = Input::get('answer');


            $form->save();


        }

        return Redirect::to('createquiz')->with('message2', 'Successfully ADD!');
    }


    }
    }


