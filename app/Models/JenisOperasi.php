<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOperasi extends Model
{
    use HasFactory;

    protected $fillable = ['kod', 'keterangan', 'aktif'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
    
    protected $cast = [
        'aktif' => 'boolean'
    ];

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class, 'kod_jenis_operasi', 'kod');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
