<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;

    protected $table = "vehiculos";

    protected $fillable = [
        'modelo',
        'marca',
        'placa',
        'color',
        'tipo',
        'estado',
        'principal_photo_path',
        'segundary_photo_path',
    ];
}
