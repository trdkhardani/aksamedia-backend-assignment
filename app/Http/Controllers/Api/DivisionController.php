<?php

namespace App\Http\Controllers\Api;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $query = Division::query();

        if ($request->has('division_name')) {
            $query->where('division_name', 'LIKE', '%' . $request->division_name . '%');
        }

        $divisions = $query->paginate(3);

        $divisionsData = collect($divisions->items())->map(function ($division) {
            return [
                'id' => $division->division_id,
                'name' => $division->division_name,
            ];
        });


        if ($divisions->isEmpty()) { // If no matched record found
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak berhasil menemukan ' . $request->division_name,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menemukan ' . $request->division_name,
            'data' => [
                'divisions' => $divisionsData
            ],
            'pagination' => [
                'total' => $divisions->total(),
                // 'count' => $divisions->count(),
                'per_page' => $divisions->perPage(),
                'current_page' => $divisions->currentPage(),
                'total_pages' => $divisions->lastPage(),
                'next_page' => $divisions->nextPageUrl(),
                'prev_page' => $divisions->previousPageUrl(),
            ],
        ]);
    }
}
