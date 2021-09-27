<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    public $incrementing = false;
    protected $fillable = ['nama_customer','alamat_customer','foto_customer','file_path_customer','subdis_id'];
    public function kecamatan()
    {
    	return $this->belongsTo(Kecamatan::class,'subdis_id');
    }
}
