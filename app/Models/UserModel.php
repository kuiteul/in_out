<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UserModel extends Model {

    protected $table = "users";
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    use HasFactory;
}
