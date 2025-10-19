<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    public function updates(): HasMany
    {
        return $this->hasMany(ActivityUpdate::class);
    }
}
