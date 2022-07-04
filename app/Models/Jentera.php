<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jentera extends Model
{
    use HasFactory;

    const STATUSES = [
        'aktif' => 'Aktif',
        'tidak_aktif' => 'Tidak Aktif'
    ];
    
    protected $fillable =[
        'kod_pbt', 
        'kod_jenis_jentera',
        'no_pendaftaran',
        'status',
        'catatan',
    ];

    function pbt() {
        return $this->belongsTo(Pbt::class,'kod_pbt');
    }

    public function scopeByPbt($query, $kod_pbt)
    {
        if ($kod_pbt !== 'KKTP') {
            return $query->where('kod_pbt', Auth::user()->current_pbt);
        } else {
            return $query->where('kod_pbt', $kod_pbt);
        }
    }

    public function getStatusColorAttribute()
    {
        return [
            'tidak_aktif' => '#fecdd3', // bg-rose-200
            'aktif' => '#a7f3d0',    // bg-emerald-200
        ][$this->status] ?? 'gray';
    }
    
}
