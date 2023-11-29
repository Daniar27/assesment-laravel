<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $fillable = [
        'nama_tenant',
        'kode_tenant',
        'no_hp'
    ];
    public function barang()
    {
        /**
         * Has Many to Attachment
        *
        * @return Collection
        *
        **/
        return $this->hasMany(Barang::class);
    }
}
