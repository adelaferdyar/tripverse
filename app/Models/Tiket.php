<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'asal',
        'tujuan',
        'berangkat',
        'tiba',
        'harga',
        'durasi',
    ];
}