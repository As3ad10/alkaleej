<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'pdf_text', 'titles', 'status'];

    protected $casts = [
        'titles' => 'array',
        'status' => 'boolean',
    ];

    public function attributes()
    {
        return $this->hasMany(InstitutionAttribute::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}