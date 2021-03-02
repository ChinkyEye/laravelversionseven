<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'name','address','phone_no','image','is_active','created_by','updated_by'
    ]; 
}
