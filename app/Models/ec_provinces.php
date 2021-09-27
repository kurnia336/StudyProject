<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ec_provinces extends Model
{
    use HasFactory;  
    protected $tables = 'ec_provinces';
    protected $primaryKey = 'prov_id';
    
    public function kota()
    {
        return $this->hasMany(ec_cities::class,'city_id');
    }
    public function postal()
    {
        return $this->hasMany(ec_postalcode::class,'postal_id');
    }
}
