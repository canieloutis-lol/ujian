<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akutansi extends Model
{
    protected $table = 'akutansis';

    protected $fillable = [
        'nama',
        'jumlah',
        'tanggal',
    ];

    public function keuangans()
    {
        return $this->hasMany(keuangant::class, 'akuntansi_id');
    }
}
