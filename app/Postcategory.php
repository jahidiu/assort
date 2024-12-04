<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcategory extends Model
{
    public function categories() {
        return $this->belongsTo('App\Postcategory', 'category_id', 'id');
    }

    public function childrenCategories() {
        return $this->hasMany('App\Postcategory', 'category_id', 'id');
    }
}
