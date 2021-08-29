<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'level',
        'name', 
        'tahun_ajaran',
       ];
}
