<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable=[

        'name',
        'category',
        'description',
        'img',
        'date'



    ];


}
