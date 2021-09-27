<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ec_subdistricts extends Model
{
    use HasFactory;
    protected $tables = 'ec_subdistricts';
    protected $primaryKey = 'subdis_id';
    
    public function customer()
    {
        return $this->hasMany(Customer::class,'id_customer');
    }
    public function kecamatan_kelurahan()
    {
        return $this->belongsTo(ec_districts::class,'dis_id');
    }
    public function postalcode()
    {
        return $this->belongsTo(ec_postalcode::class,'postal_id');
    }
}
