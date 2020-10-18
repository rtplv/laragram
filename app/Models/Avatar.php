<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['user_id', 'storage_path', 'external_path', 'active'];

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
