<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class mahasiswa_baru extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'sekolah_asal',
    ];

    public function account(): HasOne{
        return $this->hasOne(User::class);
    }
}