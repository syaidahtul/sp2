<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kontraktor extends Model
{
    const STATUSES = [
        'aktif' => 'Aktif',
        'progressing' => 'Dalam kontrak',
        'tidak_aktif' => 'Tidak Aktif'
    ];

    protected $fillable =[
        'nama',
        'alamat',
        'poskod',
        'region',
        'state',
        'no_tel_office',
        'no_fax_office',
        'contact_person_nama',
        'contact_person_no_tel',
        'catatan',
        'status'
    ];

    function pbtKontraktors()
    {
        return $this->belongsToMany(Pbt::class, 'pbt_kontraktors', 'kontraktor_id', 'kod_pbt')->withPivot('tarikh_mula', 'tarikh_tamat', 'no_kontrak', 'status_perkhidmatan', 'catatan');
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
            'aktif' => '#a7f3d0',    // bg-emerald-200
            'tidak_aktif' => '#fecdd3', // bg-rose-200
        ][$this->status] ?? 'gray';
    }

    public function getStatusDescAttribute()
    {
        return [
            'aktif' => 'Aktif',    // bg-emerald-200
            'tidak_aktif' => 'Tidak aktif', // bg-rose-200
        ][$this->status] ?? 'Dalam kontrak';
    }

}
