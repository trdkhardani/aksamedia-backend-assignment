<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['division_id'];
    protected $primaryKey = 'division_id';

    public function employee()
    {
        return $this->hasMany(Employee::class, 'division_id');
    }
}
