<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // public $timestamps = true;
    // protected $table = 'clients';
    protected $guarded = [];
    // protected $primaryKey = 'clientid';  // Set the primary key to 'clientid'

    // Specify custom timestamp column names
    // const CREATED_AT = 'createdon';
    // const UPDATED_AT = 'modifiedon';

    public static function getallClients()
    {
        return self::all();
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'client_id');
    }
}
