<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah' , 'id');
    }
}
