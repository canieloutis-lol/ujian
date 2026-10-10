<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keuangant extends Model
{
    protected $table = 'keuangants';

    protected $fillable = [
        'nama',
        'akuntansi_id',
        'jumlah',
        'tanggal',
    ];

    public function akuntansi()
    {
        return $this->belongsTo(Akutansi::class, 'akuntansi_id');
    }
}
