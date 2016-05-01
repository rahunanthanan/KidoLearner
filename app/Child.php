<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'child';
    public static $rules = array(

        'id' => 'required',
        'parentId' => 'required',
        'fName' => 'required|alpha',
        'lName' => 'required|alpha',
        /*'dateOfBirth' => '',
        'grade' => 'required',*/
        'school' => 'required|alpha'

    );
}
