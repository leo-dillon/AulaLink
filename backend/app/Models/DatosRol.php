<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosRol extends Model
{
    protected $table = 'datos_roles';

    protected $primaryKey = 'ID_DatosRol';

    protected $fillable = ['id_rol', 'Datos'];

    protected $casts = [
        'Datos' => 'array',
    ];
}

