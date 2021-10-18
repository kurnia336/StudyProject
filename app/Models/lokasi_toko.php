<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi_toko extends Model
{
    use HasFactory;
    protected $table = 'lokasi_toko';
    protected $primaryKey = 'barcode';
    public $incrementing = false;
    protected $fillable = ['barcode','nama_toko','latitude','longitude','accuracy'];
    public $timestamps = false;
}
