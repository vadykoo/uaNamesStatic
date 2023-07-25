<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamousNames extends Model
{
    protected $fillable = ['name', 'last_name', 'link', 'img', 'status', 'name_id'];
}
