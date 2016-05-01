<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Child;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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

        $childs = Child::orderBy('created_at', 'asc')->get();
        return view('Child.AddChild', [
            'childs' => $childs
        ]);

        return view('Child.AddChild');
    }

    /**
     * Add tasks to Child
     *
     * @return \Illuminate\Http\Response
     */
    function postChild()
    {
        $validator = Validator::make(Input::all(),
            array(
                'fName' => 'required|alpha',
                'lName' => 'required|alpha',
                /*'dateOfBirth' => 'required',
                'grade' => 'required',*/
                'school' => 'required'
            )
        );

        /* $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
         ]);*/

        if ($validator->fails()) {
            return redirect('/AddChild')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Child...
        $child = new Child;
        $child->fName=Input::get('fName');
        $child->lName = Input::get('lName');
        $child->dateOfBirth = Input::get('cDob');
        $child->grade = Input::get('cGrade');
        $child->school = Input::get('school');
        $child->save();

        return redirect('/AddChild');
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
