<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
    	'name','address','phone_no','is_active','created_by','updated_by'
    ];
}
