<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
	use HasFactory;
    protected $table = 'surat_masuk';

    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'pengirim',
        'perihal',
        'file',
        'tanggal',
    ];

    // Definisi lainnya seperti relasi, aksesormutator, dll.
}
