<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EmployeeMode{

    protected $table = "employees";
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    use HasFactory;
}
