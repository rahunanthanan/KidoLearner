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

class SubcategoryController extends Controller{


  //  public function index(){

      /*  $subcategories=Subcategory::all();
        return view('subCategory.index',compact('subcategories'));*/
        //return view('subCategory.index');

   // }

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

    public function create(){

        return view('subCategory.create');

    }

    public function store()
    {

        $catt=23;

        $subcategory = new SubCategory();
        $subcategory->name = Input::get('name');
        $subcategory->category_id=$catt;

        $subcategory->save();


        /*        $categoryUpdate=Request::all();
                $category=Category::fid($id);
                $category->update($categoryUpdate);
                return redirect('category');*/


        return view('subCategory.show');
    }


/*    public function edit($id)
    {

        $category=Category::find($id);

        return view('category.edit',compact('category',$category));

    }*/

/*    public function update($id){

        $categoryUpdate=Request::all();
        $category=Category::find($id);
        $category->update($categoryUpdate);
        return redirect('category');

    }*/

 /*   public function destroy($id){

        Category::find($id)->delete();
        return redirect('category');

    }*/

}