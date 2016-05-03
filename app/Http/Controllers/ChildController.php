<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Child;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use View;
use Auth;
use App\Task;
//use Item;
use App\Item;

class ChildController extends Controller
{
    /**
     * Show the Child
     *
     * @return \Illuminate\Http\Response
     */
    public function getChildView()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $user = DB::table('child')->where('parentId', '=', Auth::user()->id)->get();
        return view('Child.AddChild', [
            'childs' => $user
        ]);

        return view('Child.AddChild');
    }

    /**
     * Show the Edit Child
     *
     * @return \Illuminate\Http\Response
     */
    /*public function getEditChildView()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $name = DB::table('child')->where('parentId', '=', Auth::user()->id)->get();
        return view('Child.EditChild', [
            'names' => $name
        ]);

        return view('Child.EditChild');
    }*/

    /**
     * Edit Child
     *
     * @return \Illuminate\Http\Response
     */
    function pushChild()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $name = DB::table('child')->where('parentId', '=', Auth::user()->id)->get();
        /*return view('Child.EditChild', [
            'names' => $name
        ]);*/


        return view('Child.EditChild', [
            'names' => $name
        ]);

        return view('Child.EditChild');
    }

    function showChildDetails()
    {
        $value = Input::get('child');
        $values = DB::table('child')->where('parentId', '=', $value)->first();

        $reg=Child::find($value);

        return view("Child.EditChild", compact('reg'));
    }

    /**
     * Add Child
     *
     * @return \Illuminate\Http\Response
     */
    function postChild()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $validator = Validator::make(Input::all(),
            array(
                'firstName' => 'required|alpha',
                'lastName' => 'required|alpha',
                'dateOfBirth' => 'required',
                'schoolName' => 'required'
            )
        );

        if ($validator->fails()) {
            return redirect('/AddChild')
                ->withInput()
                ->withErrors($validator);
        }

        else
        {
            // Create The Child...
            $child = new Child;
            $child->parentId = Auth::user()->id;
            $child->fName=Input::get('firstName');
            $child->lName = Input::get('lastName');
            $child->dateOfBirth = Input::get('dateOfBirth');
            $child->grade = Input::get('cGrade');
            $child->school = Input::get('schoolName');

            $date = Input::get('dateOfBirth');

            if (preg_match("^[2-2][0-0][0-1][0-2]-[0-1][0-9]-[0-3][0-9]$^",$date) || preg_match("^[2-2][0-0][0-0][6-9]-[0-1][0-9]-[0-3][0-9]$^",$date) )
            {
                $child->save();
                return Redirect::to('/AddChild')
                    ->with('success', true)->with('message','Your child is successfully registered');
            }

            else
            {
                return Redirect::to('/AddChild')
                    ->with('fail', true)->with('message1','Please enter valid Date of Birth, Try Again');
            }
        }
    }

    /**
     * Delete tasks from Child
     *
     * @return \Illuminate\Http\Response
     */
    function deleteChild(Child $child)
    {
        $child->delete();

        return redirect('/AddChild');
    }

}
