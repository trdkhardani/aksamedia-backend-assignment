<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateEmployeeController extends Controller
{
    public function index(Request $request, $employeeId)
    {
        $employee = Employee::find($employeeId);

        if (!$employee) { // jika data karyawan yang dicari tidak ada
            return response()->json([
                'status' => 'error',
                'message' => 'Karyawan tidak ditemukan',
            ], 404);
        }

        $employeeData = $request->validate([
            'employee_photo' => ['image'],
            'employee_name' => ['required'],
            'employee_phone' => ['required', 'string', 'max:15'],
            'division_id' => ['required'],
            'employee_position' => ['required'],
        ]);

        if($request->file('employee_photo')){
            Storage::disk('public')->delete($employee->employee_photo); // hapus foto lama
            $employeeData['employee_photo'] = $request->file('employee_photo')->store('employee-photos', 'public'); // save foto baru
        }

        $employee->update($employeeData);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil memperbarui data karyawan ' . $employee->employee_name,
        ]);
    }
}
