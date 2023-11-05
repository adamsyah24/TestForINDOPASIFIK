<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titip extends Model
{
    use HasFactory;

    protected $table = 'titip';

    protected $fillable = [
        'tgl_titip',
        'tgl_berakhir',
        'harga_sewa',
        'kendaraan_id',
    ];

    public function tKendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function tSewa()
    {
        return $this->hasOne(Sewa::class, 'titip_id');
    }

}
