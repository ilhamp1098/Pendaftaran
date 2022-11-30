<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;


    protected $table = 'pegawais';
    protected $guarded = ['id'];
    
    
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah' , 'id');
    }

}
