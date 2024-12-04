<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagecategory extends Model
{
    public function categories() {
        return $this->belongsTo('App\Pagecategory', 'category_id', 'id');
    }

    public function childrenCategories() {
        return $this->hasMany('App\Pagecategory', 'category_id', 'id');
    }
}
