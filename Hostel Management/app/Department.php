<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function institutes(){
    	return $this->belongsToMany('App\Institute','institute_departments','department_id');
    }
}
