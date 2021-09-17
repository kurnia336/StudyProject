<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $tables = 'ec_subdistricts';
    protected $primaryKey = 'subdis_id';
    
    public function customer()
    {
        return $this->hasMany(Customer::class,'id_customer');
    }
}
