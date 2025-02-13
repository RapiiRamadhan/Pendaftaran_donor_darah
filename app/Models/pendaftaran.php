<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'golongan_darah',
        'no_hp',
    ];
}