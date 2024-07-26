<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orangditujuModel extends Model
{
    use HasFactory;

    protected $table = 'orang_dituju';

    protected $fillable = [
        'nama',
        'jabatan'
    ];
}
