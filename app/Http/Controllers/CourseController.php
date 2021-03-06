<?php

namespace App\Http\Controllers;

use Request;
use Carbon\Carbon;
use App\Course;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Notify;
use UxWeb\SweetAlert\SweetAlert;
use Error;
use Session;
use Alert;
use App\Providers\SweetAlertServiceProvider;
use Validator;
use Redirect;
use DB;


/**
 * Class CourseController
 * @package App\Http\Controllers
 *
 *
 * Course Management
 *
 */




class CourseController extends Controller{

    /**
     * View the created details of course
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {


        //$course=Course::find($id);


        $courses=Course::all();
        $categoryname=Category::all();

        return view('courses.index',compact('courses','categoryname'));

    }


    /**
     * View the created details of  selected course
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {


        $courses=Course::find($id);
        $categoryname=Category::find($courses->category);
        return view('showCourses.show',compact('courses','categoryname'));

        //return view('showCourses.show',compact('courses'))->with('categories',$categories);
    }

    /**
     * Categorize the coursedetails
     *
     * @return \Illuminate\Http\Response
     */



    public function categorizelesson()
    {

        $courses=Course::all();

        $subcat=$courses->category;
        $categoryname=Category::all();


        /*$subcat=Input::get('subcategory');*/




        $catlesson=DB::table('courses')

            ->where('subcat', '=','2')
            ->select('name')
            ->get();


        foreach ($courses as  $value)
        {

            echo  $value;

        }


        return view('courses.catView',compact('courses','categoryname','catlesson'));

    }




    /**
     * Create the course details
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        $categories=Category::all();
        //$categoryname=Category::find($courses->category);
        return view('courses.create')->with('categories',$categories);

    }

    /**
     * Store the coursedetails
     *
     * @return \Illuminate\Http\Response
     */

    public function store()
    {

        // validation fields
        $rules = array(
            'name' => 'Required',
            'category' => 'Required',
            'description'=>'Required',
            'filefield'=>'Required',
            'date'=>'Required'


        );

        $validation = Validator::make(Input::all(),$rules);

        // validation for file upload

        if( $validation->passes() )
        {

            $course = new Course();
            $course->name = Input::get('name');
            $course->category = Input::get('category');
            $course->description = Input::get('description');


            $file = Request::file('filefield');


            if ($file != null)
            {

                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


                $destinationPath = 'Uploads/';
                $filename = $file->getClientOriginalName();
                Input::file('filefield')->move($destinationPath, $filename);
                $course->img =$file->getClientOriginalName();
            }




            $course->date = Input::get('date');
            $course->save();

            Alert::success('Successfully Lesson Added');

            return redirect('courses');


        }


        else
        {

            return redirect('courses/create')->withErrors($validation);

        }


    }


    /**
     * Edit the coursedetails
     *
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {

        $course=Course::find($id);
        $categoryname=Category::all();
        return view('courses.edit',compact('course','categoryname'));

    }



    /**
     * Upload the  edited coursedetails
     *
     * @return \Illuminate\Http\Response
     */

    public function update($id)
    {


        $course=Course::find($id);

        // validation fields
        $rules = array(
            'name' => 'Required',
            'category' => 'Required',
            'description'=>'Required',
            'filefield'=>'Required',
            'date'=>'Required'


        );


        $validation = Validator::make(Input::all(),$rules);

        if( $validation->passes() ) {

            $file = Request::file('filefield');


            if ($file !=  null)
            {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));

                $destinationPath = 'Uploads/';
                $filename = $file->getClientOriginalName();
                Input::file('filefield')->move($destinationPath, $filename);
                $course->img = $file->getClientOriginalName();

            }


            $courseUpdate = Request::all();

            $course->update($courseUpdate);

            Alert::success('Successfully Lesson Updated');

            return redirect('courses');


        }
        else
        {
            $course=Course::find($id);
            $categoryname=Category::all();
            return view('courses.edit',compact('course','categoryname'))->withErrors($validation);

            // return redirect('courses.edit{}')->withErrors($validation);
        }

    }

    /**
     * Delete the  created coursedetails
     *
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {

        Course::find($id)->delete();
        Alert::success('Deleted');

        return redirect('courses');

    }



}
