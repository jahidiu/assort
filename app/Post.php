<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function toogle_status(){

    	if( $this->status != 1){

    	$this->status = 1;
    	}else{

    	$this->status = 0;
    	}

    	$this->save();
    }   
}
