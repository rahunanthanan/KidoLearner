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
use App\photo;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class addsubjectController extends Controller
{


    /***********get contact page view***********/

    public function getsubject()

    {

        return View::make('addsubject')
            ->with('subjects', subject::all());

    }


    public function addsubject()

    {

            $rules = array(
                'catid' => 'required',
                'category' => 'required',
                'subject' => 'required',
                'duration' => 'required'


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('addsubject')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            }

            else {
                $form = new subject();
                $form->catID = Input::get('catid');
                $form->category = Input::get('category');          // geting values from text box
                $form->subject = Input::get('subject');            // geting values from text box
                $form->duration = Input::get('duration');    // geting values from text box

                $form->save();


            }
            return Redirect::to('addsubject')->with('message2', 'Successfully ADD!');
        }




         public function editsubject()
         {



                 $rules = array(

                     'category' => 'required',
                     'subject' => 'required',
                     'duration' => 'required'


                 );

                 $validator = Validator::make(Input::all(), $rules);

                 // check if the validator failed -----------------------
                 if ($validator->fails()) {

                     return Redirect::to('managesub')->withErrors($validator)->withInput()->with('message1', 'UPDATE FAILED');
                 } else {

                     $user = new subject();
                     $id = Input::get('id');
                     $category = Input::get('category');
                     $subject = Input::get('subject');
                     $duration = Input::get('duration');
                     DB::table('subject')
                         ->where('subID', $id)
                         ->update(array('category' => $category, 'subject' => $subject, 'duration' => $duration));
                     return Redirect::to('managesub')->with('message2', 'UPDATED SUCCESSFULLY');
                 }


             }


         }