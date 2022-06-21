<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOperasi extends Model
{
    use HasFactory;

    protected $fillable = ['kod', 'keterangan', 'active'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
    
    protected $cast = [
        'active' => 'boolean'
    ];

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class, 'kod_jenis_operasi', 'kod');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
