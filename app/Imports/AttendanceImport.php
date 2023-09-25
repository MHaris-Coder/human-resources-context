<?php

namespace App\Imports;

use Illuminate\Support\row;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\{
    Attendance,
    Employee,
    Schedule
};
use Carbon\Carbon;

class AttendanceImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $scheduleId = Employee::query()->whereEmployeeRegistrationId($row['employee_registration_id'])
                        ->with('schedule')
                        ->whereHas('schedule')
                        ->latest()
                        ->first();

        if($scheduleId) {
            $totalWorkingHours = 0;
            $checkin = $row['checkin'] ? Carbon::parse($row['checkin']) : null;
            $checkout = $row['checkout'] ? Carbon::parse($row['checkout']) : null;

            if($row['checkin'] && $row['checkout']) {
                $totalWorkingHours = $checkin->diffInSeconds($checkout);
                $totalWorkingHours = number_format($totalWorkingHours/(3600), 2);
            }

            // find attendance
            $findAttendance = Attendance::query()->where('date', $row['date'])
                                ->whereEmployeeRegistrationId($row['employee_registration_id'])
                                ->whereScheduleId($scheduleId?->schedule?->id)
                                ->latest()
                                ->first();

            // should not be future date
            if(! Carbon::parse($row['date'])->isFuture()) {

                // if attendance info already exist in our record
                if($findAttendance)
                {
                    $findAttendance->checkin = $row['checkin'] ? $checkin->format('H:i:s') : null;
                    $findAttendance->checkout = $row['checkout'] ? $checkout->format('H:i:s') : null;
                    $findAttendance->total_working_hours = $totalWorkingHours;

                    // so record should only be updated
                    $findAttendance->save();
                }
                else {

                    // otherwise new record will be save
                    return new Attendance([
                        'date' => $row['date'],
                        'checkin' => $row['checkin'] ? $checkin->format('H:i:s') : null,
                        'checkout' => $row['checkout'] ? $checkout->format('H:i:s') : null,
                        'total_working_hours' => $totalWorkingHours,
                        'employee_registration_id' => $row['employee_registration_id'],
                        'schedule_id' => $scheduleId?->schedule?->id
                    ]);
                }
            }
        }
    }
}