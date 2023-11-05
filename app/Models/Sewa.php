<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa';

    protected $fillable = [
        'kendaraan_id',
        'titip_id',
        'tgl_awal',
        'tgl_akhir',
    ];

    public function sTitip()
    {
        return $this->belongsTo(Titip::class, 'titip_id');
    }

    public function sKendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
}
