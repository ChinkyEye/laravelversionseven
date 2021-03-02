<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable=[
    	'name','address','phone_no','subject','is_active','created_by','updated_by'
    ];
}
