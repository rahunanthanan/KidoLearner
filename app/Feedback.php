<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'email';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable=[

        'name',
        'email_addr',
        'comment'




    ];


}
