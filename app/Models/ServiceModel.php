<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ServiceModel extends Model {

    protected $table = "services";
    protected $primaryKey = 'service_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    use HasFactory;
}
