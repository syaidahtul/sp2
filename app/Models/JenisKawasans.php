<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKawasans extends Model
{
    use HasFactory;

    const STATUSES = [
        '1' => 'Aktif',
        '0' => 'Tidak Aktif'
    ];

    protected $fillable = ['kod','keterangan','active'];

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

    public function getAktifColorAttribute()
    {
        return [
            '0' => '#fecdd3', // bg-rose-200
            '1' => '#a7f3d0',    // bg-emerald-200
        ][$this->aktif] ?? 'gray';

    }

    public function getAktifDescAttribute()
    {
        return [
            '0' => 'Tidak aktif', // bg-rose-200
            '1' => 'Aktif',    // bg-emerald-200
        ][$this->aktif] ?? 'Ops!';
    }
}
