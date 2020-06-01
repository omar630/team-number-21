<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function departments(){
    	return $this->belongsToMany('App\Department','institute_departments','department_id');
    }
}
