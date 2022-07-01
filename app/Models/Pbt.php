<?php

namespace App\Models;

use App\Models\ModelCores\EntityHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Pbt extends EntityHistory
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['kod','nama_pbt'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

    const STATUSES = [
        'aktif' => 'Aktif',
        'tidak_aktif' => 'Tidak Aktif'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'current_pbt', 'kod');
    }

    public function scopeNotKKTP($query)
    {
        if (Auth::user()->current_pbt !== 'KKTP') {
            return $query->whereNotIn('kod', ['KKTP'])->where('kod', Auth::user()->current_pbt);
        }
    }

    public function getDeletedAtColorAttribute()
    {
        if ($this->deleted_at) {
           return '#fecdd3'; // bg-rose-200
        } else {
            return '#a7f3d0';
        }
        
    }
    
    public function getDeletedAtDescAttribute()
    { 
        if ($this->deleted_at) {
            return 'Tidak Aktif';
        } else {
            return 'Aktif';
        }
         
    }
}
