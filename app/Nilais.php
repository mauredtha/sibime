<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilais extends Model
{
    protected $fillable = [
        'id_class',
        'id_course', 
        'kode_siswa',
        'nama',
        'kode_guru',
        'nilai',
        'doc',
        'tahun_ajar'
       ];
}
