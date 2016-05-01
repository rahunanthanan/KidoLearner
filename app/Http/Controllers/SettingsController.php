<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use App\User;
use Session;
use Mail;

class SettingsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        $email=Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            if(Auth::user()->name == 'Admin')
                return Redirect::to('courses');
            elseif(Auth::attempt (['email' => $email, 'password' => $password]))
                return Redirect::to('/home');
            else{
                return view('errors');
            }
        }
    }

    /**
     * This is used to view the ChangePassword blade.
     *
     * @return view
     */
    function getViewChangePassword()
    {
        ini_set('xdebug.max_nesting_level', 200);
        return view('auth.passwords.ChangePassword');

    }


    /**
     * Change the user password
     *
     *
     * @return false | array
     */
    public function postChangePassword()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $validator = Validator::make(Input::all(),
                array(
                    'oldPassword'       => 'required',
                    'newPassword'       => 'required|min:6',
                    'confirmPassword'   => 'required|same:newPassword'
                )
            );

        if($validator->fails())
        {
            return Redirect::to('/home/ChangePassword')
                ->withInput()
                ->withErrors($validator);
        }

        else
        {
            $user = User::find(Auth::user()->id);

            $cOldPassword = Input::get('oldPassword');
            $cNewPassword = Input::get('newPassword');

            if(Hash::check($cOldPassword, $user->getAuthPassword()))
            {
                $user->password = Hash::make($cNewPassword);

                if($user->save())
                {

                    $data = ['title' => 'Your Password has been changed!!'];
                    Mail::send('auth.passwords.Content', $data, function ($m)
                    {

                        $mail = Auth::user()->email;
                        $name = Auth::user()->name;


                        $m->to($mail, $name);
                        $m->subject('Kido Learners!!');
                    });




                    return Redirect::to('/home')
                        ->with('success', true)->with('message','Your Password has been changed');
                }
            }

            else
            {
                return Redirect::to('/home/ChangePassword')
                    ->with('fail', true)->with('message1','Your Old Password is incorrect');
            }
        }

        return Redirect::to('/home/ChangePassword')
            ->with('fail', true)->with('message1','Your password could not be changed');
    }
}
