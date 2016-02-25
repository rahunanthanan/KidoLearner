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




class CourseController extends Controller
{

  public function index(){


      //$course=Course::find($id);


      $courses=Course::all();
      $categoryname=Category::all();

      return view('courses.index',compact('courses','categoryname'));

  }

  public function show($id){


        $courses=Course::find($id);
        $categoryname=Category::find($courses->category);
        return view('showCourses.show',compact('courses','categoryname'));

      //return view('showCourses.show',compact('courses'))->with('categories',$categories);


  }

  public function create(){

      $categories=Category::all();
      //$categoryname=Category::find($courses->category);
      return view('courses.create')->with('categories',$categories);

  }

  public function store()
    {



        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


        $destinationPath = 'Uploads/';
        $filename = $file->getClientOriginalName();
        Input::file('filefield')->move($destinationPath, $filename);


          $course = new Course();
          $course->name = Input::get('name');
          $course->category = Input::get('category');
          $course->description = Input::get('description');
          $course->img =$file->getClientOriginalName();
          $course->date = Input::get('date');
          $course->save();

          //Alert::message('Thanks for comment!')->persistent('Close');

          return redirect('courses');
    }

  public function edit($id)
  {

      $course=Course::find($id);
      $categoryname=Category::all();
      return view('courses.edit',compact('course','categoryname'));

  }

  public function update($id){

    $courseUpdate=Request::all();

     // $categoryname=Category::find($courses->category);
    $course=Course::find($id);
    $course->update($courseUpdate);
    return redirect('courses');



  }
   public function destroy($id){

     Course::find($id)->delete();
     return redirect('courses');

    }




}
