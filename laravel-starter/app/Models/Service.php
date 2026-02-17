<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = ['organization_id', 'name', 'duration_minutes', 'price', 'is_active'];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
