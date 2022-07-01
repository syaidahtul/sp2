<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OperasiPbt extends Model
{
    use HasFactory;

    const STATUSES = [
        'selesai' => 'Selesai',
        'sedang' => 'Sedang Dilaksanakan',
        'belum' => 'Belum Dilaksanakan'
    ];

    protected $casts = [
        'tarikh_operasi_mula' => 'date:d-m-Y',
        'tarikh_operasi_tamat' => 'date'
    ];

    protected $fillable = [
        'kod_pbt',
        'lokasi_id',
        'jenis_operasi',
        'tarikh_operasi_mula',
        'tarikh_operasi_tamat',
        'status',
        'peratus_kemajuan',
        'catatan'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'id');
    }

    public function scopeByPbt($query, $kod_pbt)
    {
        if ($kod_pbt !== 'KKTP') {
            return $query->where('kod_pbt', Auth::user()->current_pbt);
        } else {
            return $query->where('kod_pbt', $kod_pbt);
        }
    }

    protected function getTarikhOperasiMulaAttribute()
    {
        return Carbon::parse($this->attributes['tarikh_operasi_mula'])->format('d-m-Y');
    }

    protected function getTarikhOperasiTamatAttribute()
    {
        return Carbon::parse($this->attributes['tarikh_operasi_tamat'])->format('d-m-Y');
    }
}
