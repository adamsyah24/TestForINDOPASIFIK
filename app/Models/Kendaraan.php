<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $fillable = [
        'merk',
        'jenis',
        'nama',
        'nopol',
    ];

    public function kTitip()
    {
        return $this->hasOne(Titip::class, 'kendaraan_id');
    }

    public function kSewa()
    {
        return $this->hasOne(Sewa::class, 'kendaraan_id');
    }

}
