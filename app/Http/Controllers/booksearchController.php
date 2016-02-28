<?php namespace App\Http\Controllers;

use App\addnewcourse;


use Request;
use Auth;
use App\photo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\DB;
class booksearchController extends Controller
{

    /***********pastpaper view***********/

    public function show()
    {
        
        return View::make('booksearch');
            
            


    }




    /***********search pastpapers***********/

    public function searchInventory()

          {

                $inputt = Input::get('category');
                $input = Input::get('type');
                $results = DB::table('meterials')
                    ->where('category', '=', $inputt)
                    ->where('type', '=', $input)
                    ->get();
                return View::make('booksearch')->with('results', $results);
                    


            }



    /***********get file names***********/
   public function get($filename){
    
        $entry = librarymeterial::where('original_filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->attach);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
    }
 

    /*firstOrFail methods will retrieve the first
      result of the query. However, if no result is found,
     a Illuminate\Database\Eloquent\ModelNotFoundException will be thrown:
    */

}