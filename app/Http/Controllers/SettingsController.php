<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\User;
use App\Child;
use App\Http\Requests;
//use views\Profile_Management\Content;
use View;
use MyDetails;
//use Illuminate\Support\Facades\Mail;
use Fail;
use Illuminate\Support\Facades\DB;
use Hash;
//use CreateProfile;
use Mail;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Alert;
//use JsonSchema\Validator;

class SettingsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    function getViewChangePassword()
    {
        return view('Profile_Management.ChangePassword');

    }

    function getViewRecoverPassword()
    {
        return view('Profile_Management.RecoverPassword');

    }

    function getViewProfilePicture()
    {
        return view('Profile_Management.ProfilePicture');

    }

    function getViewMyDetails()
    {
        return view('Profile_Management.MyDetails');

    }

    public function loadMyDetails()
    {
        $reg=User::find(3);

        //$pname='Johnny';
        //$m_last_name = DB::table('registration')->where('FirstName','=',$pname)->value('LastName');
        return view("Profile_Management.MyDetails", compact('reg'));
    }

    public function loadProfilePicture()
    {
        $reg=User::find(3);

        //$pname='Johnny';
        //$m_last_name = DB::table('registration')->where('FirstName','=',$pname)->value('LastName');
        return view("Profile_Management.MyProfile", compact('reg'));
    }


    public function loadMyChildDetails()
    {
        $reg1=Child::find(3);

        //$pname='Johnny';
        //$m_last_name = DB::table('registration')->where('FirstName','=',$pname)->value('LastName');
        return view("Profile_Management.ViewChild", compact('reg1'));
    }

    public function changePassword()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $validator = Validator::make(
            [
                'OldPassword' =>Input::get('old_password'),
                'NewPassword' => Input::get('new_password'),
                'ConfirmPassword' => Input::get('confirm_password')
            ],
            [
                'OldPassword' => 'required|min:3',
                'NewPassword' => 'required|min:3',
                'ConfirmPassword' => 'required|min:3|same:NewPassword'
            ],
            [
                'required' => 'The :attribute field is required.'
            ]
        );

        if($validator->fails())
        {
            return view('Profile_Management.ChangePassword',['errors' =>$validator->errors()]);
        }

        else
        {
            session()->put('user','email');
            $loginId=Input::get('login_id');
            if(Auth::loginUsingId($loginId))
            {
                $newpwd = Input::get('new_password');
                $name='umamuruges2994@gmail.com';
                $pwd=Hash::make($newpwd);

                DB::table('user')
                    ->where('ID', $loginId)
                    ->update(['Password' => $pwd]);

                $data = ['title' => 'Your Password has been changed!!'];
              Mail::send('Profile_Management.Content', $data, function ($m)
              {
                  $loginID1=Input::get('login_id');

                  $email = DB::table('user')->where('ID', $loginID1)->value('Email');

                  $m->to($email, 'Tester');
                  $m->subject('Kido Learners!!');
              });

                return Redirect::to('Success1')->with('message3', 'SUCCESSFULLY CHANGED!!');
            }
        }
    }

    public function recoverPassword()
    {
        ini_set('xdebug.max_nesting_level', 200);


        $validator = Validator::make(
            [
                'email' =>Input::get('r_email'),
                'NewPassword' => Input::get('r_new_password'),
                'ConfirmPassword' => Input::get('r_confirm_password')
            ],
            [
                'email' => 'required|email',
                'NewPassword' => 'required|min:3',
                'ConfirmPassword' => 'required|min:3|same:NewPassword'
            ],
            [
                'required' => 'The :attribute field is required.'
            ]
        );

        if($validator->fails())
        {
            return view('Profile_Management.RecoverPassword',['errors' =>$validator->errors()]);
        }

        else
        {
            if (User::where('Email', '=', Input::get('r_email'))->exists())
            {
                $newpwd = Input::get('r_new_password');
                $username=Input::get('r_email');
                $pwd=Hash::make($newpwd);

                DB::table('user')
                    ->where('Email', $username)
                    ->update(['Password' => $pwd]);
                $data = ['title' => 'Your Password has been changed!!use this password'];
                Mail::send('Profile_Management.Content', $data, function ($m) {

                    $userName=Input::get('r_email');
                    $m->to($userName, 'Tester');
                    $m->subject('Kido Learners!!');
                });

                //Alert::success('Successfully Registered');

                return Redirect::to('Success1')->with('message3', 'SUCCESSFULLY CHANGED!!');
            }

            else
            {
                return Redirect::to('RecoverPassword')->with('message3', 'User Name is invalid');
            }
        }
    }

    public function uploadProfilePicture()
    {
        ini_set('xdebug.max_nesting_level', 200);


        $validator = Validator::make(
            [
                'Picture' =>Input::get('filefield'),
            ],
            [
                'Picture' => 'image',
            ],
            [
                'required' => 'The :attribute field is required.'
            ]
        );

        if($validator->fails())
        {
            return view('Profile_Management.ProfilePicture',['errors' =>$validator->errors()]);
        }

        else
        {
            $file = Request::file('filefield');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


            $destinationPath = 'C:\wamp\www\Registration\Uploads';
            $filename = $file->getClientOriginalName();
            Input::file('filefield')->move($destinationPath, $filename);

            $file = Input::file('filefield');
            $input = array('filefield' => $file);
            $rules = array(
                'filefield' => 'image'
            );
            // $user= new User;
            //$user = User::find(Auth::user()->UserName);


            $name='umamuruges2994@gmail.com';


            DB::table('user')
                ->where('email', $name)
                ->update(['ProfilePicture' => $filename]);


            return Redirect::to('Success3')->with('message3', 'SUCCESSFULLY CHANGED!!');

        }


    }

}
