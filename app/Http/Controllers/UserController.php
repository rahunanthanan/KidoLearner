<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Auth\UserInterface;
use Login;
use MyProfile;
use View;
use Fail;
use Auth;

use App\Child;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Hash;
//use CreateProfile;
use Mail;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use Auth;
//use JsonSchema\Validator;

class UserController extends Controller
{

   // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    function getViewLogin()
    {
        return view('Profile_Management.Login');
    }


    function getViewMyProfile()
    {
        return view('Profile_Management.MyProfile');
    }

    function getViewChild()
    {
        return view('Profile_Management.Child');
    }

    public function postChild()
    {
        //$v = Validator::make(Input::all(), Child::$rules);

        $validator = Validator::make(
            [
                'Name' => Input::get('c_name'),
                'DateOfBirth' => Input::get('c_dob'),
                'Grade' => Input::get('c_grade'),
                'School' => Input::get('c_school'),
            ],
            [
                'Name' => 'required',
                'DateOfBirth' => 'required',
                'Grade' => 'required',
                'School' => 'required',


            ],[

                'required' => 'The :attribute field is required.',

            ]
        );
        //check if validator fails

        if ($validator->fails()) {
            // return Redirect::to('Fail')->withErrors($v)->withInput()->with('message', 'SINUP FAILED');
            return view('Profile_Management.Create_New_Individual_Profile', ['errors' => $validator->errors()]);
        } //check if validator is scuccess
        else {


            $child = new Child;

            $child->Name = Input::get('c_name');
            $child->DateOfBirth = Input::get('c_dob');
            $child->Grade = Input::get('c_grade');
            $child->School = Input::get('c_school');
            $child->ParentID = "71";
            $child->remember_token = Input::get('_token');

            $child->save();

            return Redirect::to('Success2')->with('message', 'Thanks for registering Please Login!');
        }

    }


    public function postLogin()
    {

        $validator = Validator::make(
          [
              'UserName'=>Input::get('l_user_name'),
              'Password'=>Input::get('l_password'),
          ],
            [
                'UserName' => 'required|email',
                'Password'=> 'required|min:3',
            ],
            [
                'required' => 'The :attribute field is required.',
                'email'=> 'Your mail address is incorrect'
            ]
        );


        if($validator->fails())
        {
            return view ('Profile_Management.Login', ['errors'=> $validator->errors()]);
        }

        else
        {
            $username=Input::get('l_user_name');
            $password=Input::get('l_password');

            //if(Auth::attempt)

            if(Auth::attempt(['email' => $username, 'password' => $password]))
            {
                /*session()->put('registration',$username);*/
                return view('Profile_Management.MyProfile');
            }

            else
            {
                return view('Profile_Management.Login',['message' => 'Password is incorrect']);
            }
        }

    }


    public function getSignOut() {

        session()->put('user','token');
        //return session()->get('user');
        session()->forget('user');
       //Auth::logout();
        return view('Profile_Management.Create_New_Individual_Profile');

    }

}
