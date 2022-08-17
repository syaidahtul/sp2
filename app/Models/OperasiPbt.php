<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tarikh_operasi_mula'  => 'datetime:Y-m-d',
        'tarikh_operasi_tamat' => 'datetime:Y-m-d'
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
        if($this->attributes['tarikh_operasi_mula']){
            return $this->attributes['tarikh_operasi_mula'] = Carbon::parse($this->attributes['tarikh_operasi_mula'] )->format('d/m/Y');
        } else { return null; }
    }

    protected function getTarikhOperasiTamatAttribute()
    {
        if($this->attributes['tarikh_operasi_tamat']){
            return Carbon::parse($this->attributes['tarikh_operasi_tamat'])->format('d/m/Y');
        } else { return null; }
    }

    protected function getStatusOperasiColorAttribute()
    {
        if($this->attributes['status_operasi'] === 'selesai') {
            return 'bg-green-100';
        } elseif($this->attributes['status_operasi'] === 'sedang'){
            return 'bg-gray-100';
        } else {
            return 'bg-red-100';
        };
    }

    protected function getStatusOperasiAttribute()
    {
        if($this->attributes['status_operasi']) {
            return $this->attributes['status_operasi'];
        } else {
            return 'Opps!';
        };
    }
}
