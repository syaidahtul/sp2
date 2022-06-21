<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pbt extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['kod','nama_pbt'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

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

    public function getActiveColorAttribute()
    {
        return [
            0 => '#fecdd3', // bg-rose-200
            1 => '#a7f3d0', // bg-emerald-200
        ][$this->active] ?? 'gray';
    }
    
    public function getActiveDescAttribute()
    {
        return [
            0 => 'Tidak Aktif',
            1 => 'Aktif',
        ][$this->active] ?? 'Opps!';
    }
}
