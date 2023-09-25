<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use App\Imports\AttendanceImport;
use App\Http\Requests\AttendanceImportRequest;
use App\Http\Requests\AttendanceInfoRequest;
use App\Models\{
    Employee,
    Attendance
};

class AttendanceController extends Controller
{
    public function index()
    {
        try {
            $data = Attendance::query()->select('date', 'checkin', 'checkout', 'total_working_hours', 'employee_registration_id')->with('employee')->get();

            $data = $data->map(function($collection) {
                return [
                    'name' => $collection['employee']['name'],
                    'date' => $collection['date'],
                    'checkin' => $collection['checkin'],
                    'checkout' => $collection['checkout'],
                    'total_working_hours' => $collection['total_working_hours'],
                    'employee_registration_id' => $collection['employee_registration_id']
                ];
            });
            
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 400);
        }
    }

    public function attendanceImport(AttendanceImportRequest $request)
    {
        try {
            Excel::import(new AttendanceImport, $request->file('file')->store('files'));

            return response()->json([
                'success' => true,
                'message' => 'Attendance import successfully!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 400);
        }
    }

    public function attendanceInfo(AttendanceInfoRequest $request)
    {
        try {
            $data = [];

            $attendance = Attendance::query()->select('date', 'checkin', 'checkout', 'total_working_hours', 'employee_registration_id')->whereEmployeeRegistrationId($request->employee_registration_id)->get();

            $data['attendance'] = $attendance;
            $data['totalWorkingHours'] = $attendance->sum('total_working_hours') ?? 0;

            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 400);
        }
    }
}