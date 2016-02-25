<?php namespace App\Http\Controllers;
use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class mainController extends Controller {

    public function index()
    {
        return view('main');
    }



}