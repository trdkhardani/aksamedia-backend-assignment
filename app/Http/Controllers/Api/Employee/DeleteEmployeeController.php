<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteEmployeeController extends Controller
{
    public function index($employeeId)
    {
        $employee = Employee::find($employeeId);

        if (!$employee) { // jika data karyawan yang dicari tidak ada
            return response()->json([
                'status' => 'error',
                'message' => 'Karyawan tidak ditemukan',
            ], 404);
        }

        Storage::disk('public')->delete($employee->employee_photo); // hapus foto

        $employee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus karyawan',
        ]);
    }
}
