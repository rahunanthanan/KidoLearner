<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Category;
use DB;
use App\librarycategory;
use App\librarymeterial;
use App\librarytype;
use  Request;
use View;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;


class bookuploadController extends Controller
{


    public function viewupload()
    {
        return View::make('bookupload');


    }

    public function viewcategory()
    {
        return View::make('category');

    }

    public function viewallcat()
    {

        $count = DB::table('librarytype', 'category')

            ->select(array('category.category', DB::raw('COUNT(librarytype.typename) as Count')))
            ->join('category', 'librarytype.catID', '=', 'category.id','right outer')

            ->groupby('librarytype.catID')

            ->get();

        return View::make('viewcategory')

            ->with('count', $count);


    }



    public function uploadmaterials()
    {
        return View::make('LibraryUpload')
            ->with('categorys', librarycategory::all());

    }

    public function viewmaterials()
    {
        return View::make('viewmaterials')
            ->with('materials', librarymeterial::all());

    }


    public function viewtype()
    {
        $type=DB::table('librarytype', 'category')
            ->join('category', 'librarytype.catID', '=', 'category.id')
            ->get();
        return View::make('librarytype')
            ->with('types', $type);

    }


    public function addcategory()
    {

        $button = Input::get('btn');
        if ($button == 'ADD CATEGORY') {

            $rules = array(
                'categorys' => 'required'

            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                return Redirect::to('LibraryUpload')->withErrors($validator)->withInput()->with('message5', 'ADD FAILED');
            } else {


                $entry = new librarycategory();

                $entry->category = Input::get('categorys');

                $entry->save();

                return Redirect::to('LibraryUpload')->with('message55', 'Successfully added!');
            }


        } else if ($button == 'ADD TYPE') {


            $rules = array(
                'catid' => 'required',

                'typename' => 'required'

            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                return Redirect::to('LibraryUpload')->withErrors($validator)->withInput()->with('message3', 'ADD FAILED');
            } else {

                $catid2=DB::table('category')
                        ->where('category',Input::get('catid'))
                        ->value('id');

                $entry = new librarytype();

                $entry->catID = $catid2;

                $entry->typeName = Input::get('typename');

                $entry->save();

                return Redirect::to('LibraryUpload')->with('message33', 'Successfully added!');
            }
        } else {

            $rules = array(
                'name' => 'required',
                'author' => 'required',
                'date' => 'required',
                'pb' => 'required',
                'description' => 'required',
                'attach' => 'required|max:20480'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                return Redirect::to('LibraryUpload')->withErrors($validator)->withInput()->with('message1', 'UPLOAD FAILED');
            } else {

                $file = Request::file('attach');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
                $entry = new librarymeterial();

                $entry->category = Input::get('category');
                $entry->type = Input::get('type1');
                $entry->name = Input::get('name');
                $entry->attach = $file->getFilename() . '.' . $extension;
                $entry->original_filename = $file->getClientOriginalName();
                $entry->mime = $file->getClientMimeType();
                $entry->author = Input::get('author');
                $entry->date = Input::get('date');
                $entry->pb = Input::get('pb');
                $entry->description = Input::get('description');;


                $entry->save();

                return Redirect::to('LibraryUpload')->with('message2', 'Successfully added!');
            }
        }
    }

}