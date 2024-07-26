<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisdisposisiModel extends Model
{
    use HasFactory;

    public $table = "jenis_disposisi";

    protected $fillable = [
        'nama'
    ];
}
