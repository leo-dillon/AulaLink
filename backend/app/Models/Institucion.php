<?php
// app/Models/Institucion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
   protected $table = 'schools';
               // llave primaria
    protected $primaryKey = 'ID_Escuela';
    protected $fillable = [
        'Nombre',
        'CUE',
        'Direccion',
        'Localidad',
        'Provincia',
        'Telefonos',
        'Emails',
        'Nivel',
        'Tipo',
    ];
}

