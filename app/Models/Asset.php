<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
    'kode_asset',
    'nama_asset',
    'kategori',
    'merk',
    'serial_number',
    'lokasi',
    'status',
    'tanggal_beli'
];

    public function transactions()
{
    return $this->hasMany(Transaction::class);
}
    //
    
}
