<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    protected $fillable = [
    	'name','address','phone_no','gmail','is_active','created_by','updated_by'
    ];
}
