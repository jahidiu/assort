<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menulist extends Model
{
    public function Menus() {
        return $this->belongsTo('App\Menulist', 'parent_id', 'id');
    }

    public function childrenMenus() {
        return $this->hasMany('App\Menulist', 'parent_id', 'id');
    }
}
