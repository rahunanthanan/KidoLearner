<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\User;
use App\Http\Requests;
//use views\Profile_Management\Content;

//use Illuminate\Support\Facades\Mail;
use Fail;
use Illuminate\Support\Facades\DB;
use Hash;
//use CreateProfile;
use Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Alert;

use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\Request;
//use JsonSchema\Validator;

class SignUpController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    function getRegister()
    {

        return view('Profile_Management.Create_New_Individual_Profile');
    }

    function failure()
    {
        return view('Profile_Management.Thanks');

    }

    function success()
    {
        Session::flash('flash_sucess','');
        return view('Profile_Management.Success');

    }

    function success1()
    {
        return view('Profile_Management.Success1');

    }

    function success2()
    {
        return view('Profile_Management.Success2');

    }

    function success3()
    {
        return view('Profile_Management.Success3');

    }

    /*****Register Parent*****/
    public function postRegister()
    {
        ini_set('xdebug.max_nesting_level', 200);
        $v = Validator::make(Input::all(), User::$rules);

        //check if validator fails
        if ($v->fails())
        {
            return view('Profile_Management.Create_New_Individual_Profile', ['errors' => $v->errors()]);
        }

        else
        {
            //To attach a file
            /* $file = Request::file('filefield');
             $extension = $file->getClientOriginalExtension();
             Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


             $destinationPath = 'C:\wamp\www\Registration\Uploads';
             $filename = $file->getClientOriginalName();
             Input::file('filefield')->move($destinationPath, $filename);*/

            $user = new User;

            $user->Name = Input::get('name');
            $user->Email = Input::get('email');
            $user->Password = Hash::make(Input::get('password'));
            $user->remember_token = Input::get('_token');

            $user->save();
            // Alert::success('Successfully Registered');
            $data = ['title' => 'Welcome to Kido Learners!!'];
            Mail::send('Profile_Management.Content', $data, function ($m) {

                $m->to(Input::get('email'), 'Tester');
                $m->subject('Welcome to Kido Learners!!');
            });

            return Redirect::to('Success');

        }
    }

}


