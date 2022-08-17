<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PbtKontraktors extends Model
{

    const STATUSPERKHIDMATAN = [
        'Aktif',
        'Tamat',
        'Ditamatkan',
    ];

    protected $casts = [
        'tarikh_mula' => 'date:d-m-Y',
        'tarikh_tamat' => 'date:d-m-Y',
    ];

    protected $fillable =['kod_pbt', 'kontraktor_id', 'tarikh_mula', 'tarikh_tamat', 'no_kontrak', 'status_perkhidmatan', 'catatan'];

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
}
