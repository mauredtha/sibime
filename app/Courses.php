<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'name', 
        'level',
        'kkm',
        'kode_guru', 
        'nama_guru',
        'tahun_ajaran',
       ];
}
