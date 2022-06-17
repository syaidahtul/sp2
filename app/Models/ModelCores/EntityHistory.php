<?php

namespace App\Models\ModelCores;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class EntityHistory extends Model
{

    protected $fillable = ['created_by', 'updated_by', 'deleted_by'];

    public static function boot()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_at = NULL;
            $model->updated_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });

        parent::boot();
    }

}