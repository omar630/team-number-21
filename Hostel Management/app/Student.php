<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['roll_no','name','father_name','department_id','year','mobile','dob','gender'];
}
