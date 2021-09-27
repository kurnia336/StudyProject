<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ec_cities extends Model
{
    use HasFactory;
    protected $tables = 'ec_cities';
    protected $primaryKey = 'city_id';
    
    public function provinsi()
    {
        return $this->belongsTo(ec_provinces::class,'prov_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(ec_districts::class,'dis_id');
    }
    public function postal_code()
    {
        return $this->hasMany(ec_postalcode::class,'postal_id');
    }

}
