<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Informasi extends Model
{
    protected $fillable = [
        'judul',
        'informasi'
    ];

    public function Akun(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
