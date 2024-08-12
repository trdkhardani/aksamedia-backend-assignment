<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class ReadEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('employee_name')) {
            $query->where('employee_name', 'LIKE', '%' . $request->employee_name . '%');
        }

        if ($request->has('division_id')) {
            $query->where('division_id', 'LIKE', '%' . $request->division_id . '%');
        }

        $employees = $query->paginate(3);

        $employeesData = collect($employees->items())->map(function ($employee) {
            return [
                'id' => $employee->employee_id,
                'image' => url('/storage/' . $employee->employee_photo),
                'name' => $employee->employee_name,
                'phone' => $employee->employee_phone,
                'division' => [
                    'id' => $employee->division->division_id,
                    'name' => $employee->division->division_name,
                ],
                'position' => $employee->employee_position,
            ];
        });


        if ($employees->isEmpty()) { // If no matched record found
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak berhasil menemukan karyawan ' . $request->employee_name,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menemukan karyawan ' . $request->employee_name,
            'data' => [
                'employees' => $employeesData
            ],
            'pagination' => [
                'total' => $employees->total(),
                // 'count' => $employees->count(),
                'per_page' => $employees->perPage(),
                'current_page' => $employees->currentPage(),
                'total_pages' => $employees->lastPage(),
                'next_page' => $employees->nextPageUrl(),
                'prev_page' => $employees->previousPageUrl(),
            ],
        ]);
    }
}
