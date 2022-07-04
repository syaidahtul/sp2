<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    const STATUSES = [
        '1' => 'Aktif',
        '0' => 'Tidak Aktif'
    ];

    const NEGERI = [
        'SABAH', 'SARAWAK', 'SELANGOR', 'JOHOR', 'KEDAH', 'KELANTAN', 'MELAKA', 'PAHANG', 'PERAK', 'PERLIS', 'PULAU PINANG', 'NEGERI SEMBILAN', 'TERENGGANU', 'W.P. KUALA LUMPUR', 'W.P. LABUAN', 'W.P. PUTRAJAYA'
    ];
    
    public $timestamps = false;

    protected $fillable = ['kod','nama'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

    public function getAktifColorAttribute()
    {
        return [
            '0' => '#fecdd3', // bg-rose-200
            '1' => '#a7f3d0',    // bg-emerald-200
        ][$this->aktif] ?? 'gray';
        
    } 
    
    public function getAktifDescAttribute()
    { 
        return [
            '0' => 'Tidak aktif', // bg-rose-200
            '1' => 'Aktif',    // bg-emerald-200
        ][$this->aktif] ?? 'Ops!';         
    }
}
