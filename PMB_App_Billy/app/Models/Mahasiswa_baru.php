<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class mahasiswa_baru extends Model
{
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'sekolah_asal',
        'alamat',
        'nomor_telp',
        'email',
        'pilihan_program_studi',
        'waktu_kuliah_pilihan'
    ];

    public function account(): HasOne{
        return $this->hasOne(User::class);
    }
}