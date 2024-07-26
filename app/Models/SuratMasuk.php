<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
	use HasFactory;
    protected $table = 'surat_masuk';

    protected $fillable = [
        'nomor_surat',
        'pengirim',
        'perihal',
        'file',
        'tanggal',
    ];

    // Relasi ke Disposisi
    public function disposisi()
    {
        return $this->hasMany(Disposisi::class, 'id', 'id');
    }
    //Relasi ke orangdituju
    public function orangDituju()
    {
        return $this->belongsTo(orangditujuModel::class, 'id');
    }
    //relasi ke jenis disposisi
    public function jenisDisposisi()
    {
        return $this->belongsTo(jenisdisposisiModel::class, 'id');
    }
}
