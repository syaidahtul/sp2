<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TapakPelupusanSampahs extends Model
{
    const KAEDAHPELUPUSAN = [
        'open' => 'Open Dumping',
        'sanitary' => 'Sanitary Landfill'
    ];

    protected $fillable = ['nama', 'kaedah_pelupusan','longitude','latitude'];

    function pbt()
    {
        return $this->belongsToMany(Pbt::class, 'pbt_tapak_pelupusan_sampahs');
    }

    function kos()
    {
        return $this->hasManyThrough(KosPelupusanSampah::class, PbtTapakPelupusanSampahs::class, 'pbt_tapak_pelupusan_sampahs');
    }

    public function scopeByPbt($query, $kod_pbt)
    {
        if ($kod_pbt !== 'KKTP') {
            return $query->where('kod_pbt', Auth::user()->current_pbt);
        } else {
            return $query->where('kod_pbt', $kod_pbt);
        }
    }

    public function getKaedahPelupusanLabelAttribute()
    {
        return TapakPelupusanSampahs::KAEDAHPELUPUSAN[$this->kaedah_pelupusan];
    }
}
