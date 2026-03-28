<?php

namespace App\Models;

use App\Enums\PaymentMethodsEnum;
use App\Enums\PaymentRequestStatusEnum;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable = [
        'course_id',
        'institution_id',
        'period',
        'title',
        'fullname',
        'id_number',
        'phone_number',
        'payment_method',
        'status',
    ];

    protected $casts = [
        'status' => PaymentRequestStatusEnum::class,
        'payment_method' => PaymentMethodsEnum::class,
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}