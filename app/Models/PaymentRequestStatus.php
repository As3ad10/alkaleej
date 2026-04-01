<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequestStatus extends Model
{
    protected $fillable = ['name', 'color', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}