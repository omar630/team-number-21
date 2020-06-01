<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = ['building_name','address','institute_id','room_count','students_capacity','anual_expense','user_id'];

    public function institute(){
    	return $this->belongsTo('App\Institute');
    }

    public function hostels(){
    	return $this->hasMantThrough('App\Institute','App\User');
    }
}
