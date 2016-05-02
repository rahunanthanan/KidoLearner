<?php

namespace App\Http\Controllers;

use App\Subcategory;
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
use DB;
use Validator;



class SubcategoryController extends Controller{




    //  public function index(){

    /*  $subcategories=Subcategory::all();
      return view('subCategory.index',compact('subcategories'));*/
    //return view('subCategory.index');

    // }



    /**
     * View the created details of group
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id){

        $cat=Category::find($id);

        $subcat = DB::table('subcategories')
            ->where('category_id', '=', $cat->id)
            //e    ->select('name')
            ->get();

        return view('subCategory.show',compact('subcat','cat'));

    }



    /*    public function create($catId){

            return view('subCategory.create',compact('catId'));

        }*/


    /**
     * Create the  details of group
     *
     * @return \Illuminate\Http\Response
     */



    public function create($id){

        $cat=Category::find($id);

        $subcat = DB::table('subcategories')
            ->where('category_id', '=', $cat->id)
            //e    ->select('name')
            ->get();



        return view('subCategory.create',compact('cat','subcat'));

    }


    /**
     * Store the  details of group
     *
     * @return \Illuminate\Http\Response
     */


    public function store()
    {
        $id=23;
        //$catt=Input::get('catId');


        $subcategory = new SubCategory();
        $subcategory->name = Input::get('name');
        $subcategory->category_id=$id;

        $subcategory->save();


        return redirect('category');


        /*        $cat=Category::find($id);

                $subcat = DB::table('subcategories')
                    ->where('category_id', '=', $cat->id)
                    //e    ->select('name')
                    ->get();

                return view('subCategory.show',compact('cat','subcat'));


                /*        $categoryUpdate=Request::all();
                        $category=Category::fid($id);
                        $category->update($categoryUpdate);
                        return redirect('category');*/


        //return view('subCategory.show');
    }


    /**
     *  Edit the  details of group
     *
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {

        $subcategory=Subcategory::find($id);

        return view('subCategory.edit',compact('subcategory',$subcategory));

    }


    /**
     *  Edit the  details of group
     *
     * @return \Illuminate\Http\Response
     */

    public function update($id)
    {


        $rules = array(
            'name' => 'Required'

        );

        $validation = Validator::make(Input::all(),$rules);

        if( $validation->passes() )
        {


            $subcategoryUpdate = Request::all();
            $subcategory = Subcategory::find($id);
            $subcategory->update($subcategoryUpdate);

            Alert::success('Successfully Updated');

            return redirect('category');
        }
        else

        {



            $subcategory=Subcategory::find($id);

            return view('subCategory.edit',compact('subcategory',$subcategory))->withErrors($validation);


        }















    }

    /*   public function destroy($id){

           Category::find($id)->delete();
           return redirect('category');

       }*/

}