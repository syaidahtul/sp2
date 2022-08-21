<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PbtTapakPelupusanSampahs extends Model
{
    use HasFactory;

    protected $fillable = ['kod_pbt', 'tapak_pelupusan_sampah_id'];

    function pbt() {
        return $this->belongsTo(Pbt::class,'kod_pbt');
    }

    function kos()
    {
        return $this->hasMany(KosPelupusanSampah::class, 'tapak_pelupusan_sampah_id', 'id');
    }

    public function scopeByPbt($query, $kod_pbt)
    {
        if ($kod_pbt !== 'KKTP') {
            return $query->where('kod_pbt', Auth::user()->current_pbt);
        } else {
            return $query->where('kod_pbt', $kod_pbt);
        }
    }
}
