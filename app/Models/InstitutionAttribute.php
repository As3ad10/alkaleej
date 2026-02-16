<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionAttribute extends Model
{
    protected $fillable = ['institution_id', 'name', 'type', 'is_required', 'options', 'status'];

    protected $casts = [
        'type' => \App\Enums\InstitutionAttributeTypeEnum::class,
        'is_required' => 'boolean',
        'status' => 'boolean',
        'options' => 'array',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}