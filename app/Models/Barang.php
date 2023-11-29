<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'satuan',
        'harga_satuan',
        'stok'
    ];

    public function tenant()
    {
        /**
         * Belong to Event Information
         *
         * @return Collection
         *
         **/
        return $this->belongsTo(Tenant::class);
    }
}
