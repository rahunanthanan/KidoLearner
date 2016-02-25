<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'child';
    public static $rules = array(

        'c_name' => 'required',
        'c_dob' => 'required',
        'c_grade' => 'required',
        'c_school' => 'required',
    );


}
