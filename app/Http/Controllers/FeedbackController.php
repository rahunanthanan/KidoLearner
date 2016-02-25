<?php

namespace App\Http\Controllers;
use App\Email;
use App\Feedback;
use Carbon\Carbon;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Database;
use DB;
use App\Quotation;
use Illuminate\Html;

class FeedbackController extends Controller{


    public function show() {


        return view('emails.feedbackView');
 }


    public function store()
    {

        $feed = new Feedback();

        $feed->name = Input::get('first_name');
        $feed->email_addr = Input::get('email');
        $feed->comment = Input::get('message');
        $feed->dateAndTime=date('Y-m-d H:i:s');

        $feed->save();

        //Alert::message('Thanks for comment!')->persistent('Close');

        return view('emails.feedback');
    }

/*    public function getFeedform(){

        $data=Input::all();

        $rules=array(

            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number'=>'numeric|min:10',
            'email' => 'required|email',
            'message' => 'required|min:25'

     );

        $validator=Validator::make($data,$rules);

        if($validator->passes()){*/





/*            Mail::send('emails.hello',$data,function($message) use($data){

                $message->from($data['email'],$data['first_name']);

                $message->to('rcholan11@gmail.com','Jeyamaal')->cc('rcholan11@gmail.com')->subject('Feedback');

            });*/

/*            return View::make('emails.hello');

        }
        else{

            return Redirect::to('emails.hello')->withErrors($validator);
        }


 }*/

    public function index(){

        $feed = DB::table('email')
            ->orderBy('dateAndTime', 'desc')
            ->get();

        return view('emails.feedbackView',compact('feed'));

        //return view('showCourses.show',compact('courses'))->with('categories',$categories);
    }

    public function destroy($id){

        Feedback::find($id)->delete();
        return redirect('emails');

    }


}
