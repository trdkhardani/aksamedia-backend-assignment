<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class CreateEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employeeData = $request->validate([
            'employee_photo' => ['required', 'image'],
            'employee_name' => ['required'],
            'employee_phone' => ['required', 'string', 'max:15', 'unique:employees'],
            'division_id' => ['required'],
            'employee_position' => ['required'],
        ]);

        if($request->file('employee_photo')){
            $employeeData['employee_photo'] = $request->file('employee_photo')->store('employee-photos', 'public');
        }

        Employee::create($employeeData);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan karyawan ' . $request->employee_name,
        ]);
    }
}
