<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];  

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien' , 'id');
    }  
    
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat' , 'id');
    }      
}
