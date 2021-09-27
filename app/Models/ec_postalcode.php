<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ec_postalcode extends Model
{
    use HasFactory;
    protected $table = 'ec_postalcode';
    protected $primaryKey = 'postal_id';

    public function postalKecamatan()
    {
        return $this->belongsTo(ec_districts::class,'dis_id');
    }
    public function postalKelurahan()
    {
        return $this->belongsTo(ec_subdistricts::class,'subdis_id');
    }
    public function postalKota()
    {
        return $this->belongsTo(ec_cities::class,'city_id');
    }
    public function postalProvinsi()
    {
        return $this->belongsTo(ec_provinces::class,'prov_id');
    }

    
}
