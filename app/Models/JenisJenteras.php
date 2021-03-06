<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJenteras extends Model
{
    use HasFactory;

    protected $fillable = ['kod','keterangan','active'];

    protected $primaryKey = 'kod';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
    
    protected $cast = [
        'active' => 'boolean'
    ];
}
