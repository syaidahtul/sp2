<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KosPelupusanSampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kod_pbt',
        'tapak_pelupusan_sampah_id',
        'amount'
    ];

    function tapakPelupusanSampah() {
        
    }
}
