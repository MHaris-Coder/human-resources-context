<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'checkin',
        'checkout',
        'total_working_hours',
        'employee_registration_id',
        'schedule_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_registration_id', 'employee_registration_id');
    }
}
