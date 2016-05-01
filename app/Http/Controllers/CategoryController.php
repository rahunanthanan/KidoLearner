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

class CategoryController extends Controller{


    public function index(){

        $categories=Category::all();
        return view('category.index',compact('categories'));

    }



    public function create(){

        return view('category.create');

    }

    public function store()
    {

        $rules = array(
            'name' => 'Required'

        );

        $validation = Validator::make(Input::all(),$rules);


        if( $validation->passes() ) {

            $category = new Category();
            $category->name = Input::get('name');

            $category->save();

            Alert::success('Successfully Added');

            return redirect('category');


        } else {

            Session::flash('flash_category_empty',''); //<--FLASH MESSAGE
            return view('category.create');

        }





    }

    public function edit($id)
    {
        $category=Category::find($id);

        return view('category.edit',compact('category',$category));
    }

    public function update($id){


        $rules = array(
            'name' => 'Required'

        );

        $validation = Validator::make(Input::all(),$rules);

        if( $validation->passes() ) {

            $categoryUpdate=Request::all();
            $category=Category::find($id);
            $category->update($categoryUpdate);

            Alert::success('Successfully Updated');

            return redirect('category');


        }
        else
        {
            Session::flash('flash_category_empty',''); //<--FLASH MESSAGE

            return redirect('category');
        }




    }

    public function destroy($id){



        Session::flash('flash_category_delete','');

        //  $result=Input::get('onsubmit');

        //if( $result == 'true') {

        Category::find($id)->delete();
        return redirect('category');
        // }
    }

}