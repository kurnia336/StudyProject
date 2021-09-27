<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ec_districts extends Model
{
    use HasFactory;
    protected $tables = 'ec_districts';
    protected $primaryKey = 'dis_id';

    public function city()
    {
        return $this->belongsTo(ec_cities::class,'city_id');
    }
    public function kelurahan()
    {
        return $this->hasMany(ec_subdistricts::class,'subdis_id');
    }
    public function postalCode()
    {
        return $this->hasMany(ec_postalcode::class,'postal_id');
    }
}