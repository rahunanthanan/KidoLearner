<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model{

    protected $table = 'fileentries';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable=[

        'id',
        'category',
        'subcategory',
        'lesson',
        'filename',
        'mime',
        'original_filename',
        'date'





    ];
}
