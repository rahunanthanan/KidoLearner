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

class hp_replyController extends Controller
{


    public function getpage()
    {

        return View::make('hp_reply')
        ->with('helps', helpdesk_complaint::all())
        ->with('doubts', helpdesk_doubts::all())
        ->with('req', helpdesk_request::all());
            

    }

  

     public function edit()

    {
        $button = Input::get('btn');
        if ($button == 'Add') {

            $rules = array(

                'reply' => 'required'
             


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            }  else {

                $entry = new helpdesk_complaint();
                $id = Input::get('id');
                $reply = Input::get('reply');
                
                $entry->remember_token = Input::get('_token');

                DB::table('helpdesk_complaint')
                    ->where('HID', $id)
                    ->update(array('reply' => $reply));
                return Redirect::to('hp_reply')->with('message2', 'UPDATED SUCCESSFULLY');
            }
        }


       if ($button == 'SendReply') {

            $rules = array(

                'reply' => 'required'
             


            );

            $validator = Validator::make(Input::all(), $rules);//checking validation rules

            if ($validator->fails()) {
                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'Add FAILED');
            } else {

                $entry = new helpdesk_doubts();
                $id = Input::get('id');
                $reply = Input::get('reply');
                
                $entry->remember_token = Input::get('_token');

                DB::table('helpdesk_doubts')
                    ->where('HID', $id)
                    ->update(array('reply' => $reply));
                return Redirect::to('hp_reply')->with('message2', 'UPDATED SUCCESSFULLY');
            }
        }

        else
        {
            $rules = array(

                'reply' => 'required'
              


            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('helpdesk')->withErrors($validator)->withInput()->with('message1', 'ADD FAILED');
            }
           else {

                $entry = new helpdesk_request();
                $id = Input::get('id');
                $reply = Input::get('reply');
                
                $entry->remember_token = Input::get('_token');

                DB::table('helpdesk_request')
                    ->where('HID', $id)
                    ->update(array('reply' => $reply));
                return Redirect::to('hp_reply')->with('message2', 'UPDATED SUCCESSFULLY');
            }


        }

    }

}