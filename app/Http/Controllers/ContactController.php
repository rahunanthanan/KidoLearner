<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Request;
use Carbon\Carbon;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation;
use UxWeb\SweetAlert\SweetAlert;
use Validator;
use Mail;
use Redirect;
use Route;
use Error;
use Session;
use Alert;
use App\Providers\SweetAlertServiceProvider;
use Notify;







 class ContactController extends  Controller{


    public function getContactForm()
    {

        return view('emails.feedback');

    }


    public function getContactUsForm()
    {

        //Session::flash('flash_message','Your mail has been sent');

        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array(
            'first_name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        );

        //Validate data
        $validator = Validator::make($data, $rules);

        //If everything is correct than run passes.
        if ($validator->passes()) {

            Mail::send('emails.hello', $data, function ($message) use ($data) {
//                $message->from($data['email'] , $data['first_name']);
                $message->from('bhuvitharan@gmail','feedback contact form');
                //email 'To' field: cahnge this to emails that you want to be notified.
                $message->to('bhuvitharan@gmail', 'Bhuvi')->cc('feedback@gmail.com')->subject('KidoLearner Feedback');
            });



            //alert('Hello World!')->persistent("Close this");

            return Redirect('emails/feedback');

            //return View::make('contact');
        } else {
            //return contact form with errors
            return Redirect::to ('emails/feedback')
                ->withErrors($validator);

        }
    }
}
