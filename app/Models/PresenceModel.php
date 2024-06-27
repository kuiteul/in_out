<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PresenceModel extends Model {

    protected $table = "presence";
    protected $primaryKey = 'presence_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    use HasFactory;
}
