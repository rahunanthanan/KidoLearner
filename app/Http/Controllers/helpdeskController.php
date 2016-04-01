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
use App\helpdesk_complaint;
use App\helpdesk_doubts;
use App\helpdesk_request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class helpdeskController extends Controller
{


    public function gethelpdesk()
    {

        return View::make('helpdesk');
            

    }

    public function viewreply()
    {

    	    $helps = DB::table('helpdesk_complaint')
            ->where('helpdesk_complaint.reply','!=','Not Replied')->get();

            $doubts = DB::table('helpdesk_doubts')
            ->where('helpdesk_doubts.reply','!=','Not Replied')->get();

            $req = DB::table('helpdesk_request')
            ->where('helpdesk_request.reply','!=','Not Replied')->get();
     

        return View::make('viewhelpdesk')
         ->with('helps', $helps)
         ->with('doubts', $doubts)
          ->with('req', $req);
            

    }


     public function add()

    {
        $button = Input::get('btn');
        if ($button == 'Send') {

            $rules = array(

                'complaint' => 'required'
             


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            } else {
                $form = new helpdesk_complaint();
                $form->PID = Input::get('id');
                $form->description = Input::get('complaint');
                $form->reply = "Not Replied";
                
                $form->save();


            }
            return Redirect::to('helpdesk')->with('message2', 'Successfully ADD!');
        }


       if ($button == 'SendDoubt') {

            $rules = array(

                'doubt' => 'required'
             


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            } else {
                $form = new helpdesk_doubts();
                $form->PID = Input::get('id');
                $form->description = Input::get('doubt');
                $form->reply = "Not Replied";
                
                $form->save();


            }
            return Redirect::to('helpdesk')->with('message2', 'Successfully ADD!');
        }

        else
        {
            $rules = array(

                'title' => 'required',
                'description' => 'required'


            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'ADD FAILED');
            }
            else {
                $form = new helpdesk_request();
                $form->PID = Input::get('id');
                $form->title = Input::get('title');
                $form->request_type = Input::get('type');
                $form->description = Input::get('description');
                $form->reply = "Not Replied";
                $form->save();


            }
            return Redirect::to('helpdesk')->with('message2', 'Successfully ADD!');


        }

    }

}