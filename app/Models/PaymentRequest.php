<?php

namespace App\Models;

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
        'payment_method_id',
        'payment_request_status_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function paymentRequestStatus()
    {
        return $this->belongsTo(PaymentRequestStatus::class);
    }
}