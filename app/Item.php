<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function todoList() {
        return $this->hasMany('App\Item');
    }
}

