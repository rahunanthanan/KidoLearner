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
        /*'parentId' => 'required'*/
        'firstName' => 'required|alpha',
        'lastName' => 'required|alpha',
        'dateOfBirth' => 'required',
        /*'dateOfBirth' => '',
        'grade' => 'required',*/
        'schoolName' => 'required|alpha'

    );
}
