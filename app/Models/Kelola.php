<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelola extends Model
{
    protected $fillable = [
        'user_id',
        'alamat',
        'jenis_sampah',
        'berat_sampah',
        'status',
        'tanggal_verifikasi',
        'point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBeratFormattedAttribute()
    {
        if ($this->berat_sampah >= 1000) {
            return number_format($this->berat_sampah / 1000) . ' kg';
        }
        return $this->berat_sampah . ' g';
    }
}