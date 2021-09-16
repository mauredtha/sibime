<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materis extends Model
{
    protected $fillable = [
        'id_class',
        'ic_course', 
        'kode_guru',
        'tahun_ajar',
        'materi',
        'latihan',
        'ulangan_harian',
        'remidial',
        'tgl_deadline',
        'tgl_mulai'
       ];
}
