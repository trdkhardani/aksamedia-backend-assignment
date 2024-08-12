<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['employee_id'];
    protected $primaryKey = 'employee_id';

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
