<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi',
        'kod_pbt',
        'kod_jenis_operasi',
        'kod_jenis_kawasan',
    ];

    function pbt() {
        return $this->belongsTo(Pbt::class,'kod_pbt');
    }

    public function scopeLokasiPbt($query, $kod_pbt)
    {
        if (Auth::user()->current_pbt !== 'KKTP') {
            return $query->where('kod_pbt', Auth::user()->current_pbt);
        } else {
            return $query->where('kod_pbt', $kod_pbt);
        }
    }

}
