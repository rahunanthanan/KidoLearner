<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Alert;
use UxWeb\SweetAlert\SweetAlert;

class FileController extends Controller {


    public function index()
    {
        $entries = Fileentry::all();

        return view('fileentries.index', compact('entries'));
    }

    public function add() {

        if (Input::hasFile('filefield')) {

            $file = Request::file('filefield');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));

            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename() . '.' . $extension;

            $entry->save();

            Alert::success('Successfully Added');

            return redirect('viewentry');
        }


        else
        {

            Alert::error('Please Add File', 'Error')->persistent('Close');

            return redirect('viewentry');
        }
    }

    public function get($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }
}

