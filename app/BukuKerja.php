<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuKerja extends Model
{
    protected $fillable = [
        'kategori',
        'name',
        'file', 
        'tahun_ajaran',
       ];
}
