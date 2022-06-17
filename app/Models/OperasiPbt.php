<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperasiPbt extends Model
{
    use HasFactory;

    const STATUSES = [
        'selesai' => 'Selesai',
        'sedang' => 'Sedang Dilaksanakan',
        'belum' => 'Belum'
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

    public function getDateFormat()
    {
        
    }
}
