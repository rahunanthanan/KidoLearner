<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use App\Subcategory;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Alert;
use App\Course;
use App\Category;
use UxWeb\SweetAlert\SweetAlert;
use Validator;

class FileController extends Controller {


    public function index()
    {


        $categoryname=Category::all();
        $entries = Fileentry::all();

       $lessonName=DB::table('courses')
            ->join('fileentries', 'courses.id', '=', 'fileentries.lesson')

            ->select('courses.name')
            ->get();


        return view('fileentries.index', compact('entries','courses','categoryname','lessonName'));
    }

    // View the uploaded file details

    public function show(){


        $categoryname=Category::all();
        $entries = Fileentry::all();

        $lessonName=DB::table('courses')
            ->join('fileentries', 'courses.id', '=', 'fileentries.lesson')

            ->select('courses.name')
            ->get();


        return view('showCourseMaterials.show', compact('entries','courses','categoryname','lessonName'));


    }


    //store the details of uploaded file in database

    public function store() {


        // validation fields of uploaded file page
        $rules = array(

            'category' => 'Required',
            'subcategory'=>'Required',
            'filefield'=>'Required|mimes:jpeg,bmp,png,pdf,docx,ppt',



        );

        $validation = Validator::make(Input::all(),$rules);

        if( $validation->passes() ) {


            $entry = new Fileentry();
            $entry->category = Input::get('category');
            $entry->subcategory = Input::get('subcategory');
            $entry->lesson = Input::get('lesson');
            $entry->date=date('Y-m-d');


            // get the input from filefield in blade page
            $file = Request::file('filefield');

             if ($file != null) {

                $file = Request::file('filefield');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


                $entry->mime = $file->getClientMimeType();

                 // store the files under the "MyFiles folder
                 $destinationPath = 'Myfiles/';


                $filename = $file->getClientOriginalName();

                $entry->original_filename = $file->getClientOriginalName();

                Input::file('filefield')->move($destinationPath, $filename);

                $entry->filename = $file->getFilename() . '.' . $extension;
             }

            $entry->save();

            Alert::success('Successfully Added');

            return redirect('viewentry');



        }


        else
        {
            // Error message for  Adding

            Alert::error('Please Add File or Choose correct file type', 'Error')->persistent('Close');

            $categories=Category::all();
            $subcategories=Subcategory::all();
            $courses=Course::all();
            return view('fileentries.create', compact('categories','subcategories','courses'));
        }



    }

/*    public function get($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }*/


    // retirve details of

    public function create(){

        $categories=Category::all();
        $subcategories=Subcategory::all();
        $courses=Course::all();
        return view('fileentries.create', compact('categories','subcategories','courses'));

    }



    public function edit($id)
    {

        $entries=Fileentry::find($id);



        $categories = DB::table('categories')
            ->where('id', '=', $entries->category)
            ->get();


        $subcategories = DB::table('subcategories')
            ->where('id', '=', $entries->subcategory)
            ->get();

        $courses= DB::table('courses')
            ->where('id', '=', $entries->lesson)
            ->get();

        return view('fileentries.edit',compact('entries','categories','subcategories','courses'));

    }

    // update the uploaded file details

    public function update($id){

        $entry = Fileentry::find($id);
        // validation fields
        $rules = array(


            'category' => 'Required',
            'subcategory'=>'Required',
            'filefield'=>'Required',
            'date'=>'Required'
        );


        $validation = Validator::make(Input::all(),$rules);

        $file = Request::file('filefield');

        if( $validation->passes() ) {

            if ($file !=  null)
            {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));


                $entry->mime = $file->getClientMimeType();

                $destinationPath = 'Myfiles/';

                $filename = $file->getClientOriginalName();

                $entry->original_filename = $file->getClientOriginalName();

                Input::file('filefield')->move($destinationPath, $filename);

                $entry->filename = $file->getFilename() . '.' . $extension;


            }
            $fileUpdate = Request::all();

            $entry->update($fileUpdate);

            Alert::success('Successfully Lesson Updated');

            return redirect('fileentries');


        }
        else
        {
            $entries=Fileentry::find($id);

            $categories = DB::table('categories')
                ->where('id', '=', $entries->category)
                ->get();


            $subcategories = DB::table('subcategories')
                ->where('id', '=', $entries->subcategory)
                ->get();

            $courses= DB::table('courses')
                ->where('id', '=', $entries->lesson)
                ->get();

            return view('fileentries.edit',compact('entries','categories','subcategories','courses'))->withErrors($validation);


        }



    }


    // delete the details of uploadedfile

    public function destroy($id){

        Fileentry::find($id)->delete();

     // Sucess message for deleted file
        Alert::success('File Deleted');


        return redirect('viewentry');

    }





}

