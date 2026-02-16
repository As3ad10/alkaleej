<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'course_id',
        'institution_id',
        'period',
        'fullname',
        'id_number',
        'phone_number',
        'institution_attributes'
    ];

    protected $casts = [
        'institution_attributes' => 'array',
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