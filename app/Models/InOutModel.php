<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class InOutModel extends Model {

    protected $table = "in_out";
    protected $primaryKey = 'in_out_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    use HasFactory;
}
