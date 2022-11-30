<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];  

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'id_tindakan' , 'id');
    }  
}
