<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    protected $table = 'subcategories';

    //protected $primaryKey = 'id';

    //protected $foreignKey = 'category_id';

    public $timestamps = false;

    protected $fillable=[

        'name',
        'category_id'




    ];


}
