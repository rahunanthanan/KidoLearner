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


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class addquizController extends Controller
{


    /***********get contact page view***********/
    public function getquiz()
    {

        return View::make('addquiz')
            ->with('subjects', subject::all())
            ->with('quizz', quiz::all());



    }


    public function addquiz()

    {
        $button = Input::get('btn');
        if ($button == 'Submit') {

            $rules = array(

                'que1' => 'required',
                'op1' => 'required',
                'op2' => 'required',
                'op3' => 'required',
                'op5' => 'required',
                'answer' => 'required'


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('addquiz')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            } else {
                $form = new quiz();
                $form->category = Input::get('category');
                $form->subject = Input::get('subject');
               
                $form->question = Input::get('que1');
                $form->option1 = Input::get('op1');
                $form->option2 = Input::get('op2');
                $form->option3 = Input::get('op3');
                $form->option4 = Input::get('op5');
                $form->answer = Input::get('answer');

                $form->save();


            }
            return Redirect::to('addquiz')->with('message2', 'Successfully ADD!');
        }

        else
        {
            $rules = array(

                'quee1' => 'required',


            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('addquiz')->withErrors($validator)->withInput()->with('message1', 'UPDATE FAILED');
            } else {

                $user = new quiz();
                $id = Input::get('id');
                $quee1 = Input::get('quee1');
                $op1 = Input::get('opp1');
                $op2 = Input::get('opp2');
                $op3 = Input::get('opp3');
                $op5 = Input::get('opp5');
                $answer = Input::get('answerr');
                DB::table('quiz')
                    ->where('queID', $id)
                    ->update(array('question' => $quee1, 'option1' => $op1, 'option2' => $op2,'option3' => $op3,'option4' => $op5,'answer' => $answer));
                return Redirect::to('addquiz')->with('message2', 'UPDATED SUCCESSFULLY');
            }


        }

    }

}