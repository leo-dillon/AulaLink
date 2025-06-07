<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRolEscuela extends Model
{
    use HasFactory;

    protected $table = 'usuario_rol_escuela';
    protected $primaryKey = 'ID_UserRolEscuela';

    protected $fillable = [
        'Usuario_ID',
        'Escuela_ID',
         'id_role',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario_ID', 'ID_Usuario');
    }

    public function escuela()
    {
        return $this->belongsTo(Institucion::class, 'Escuela_ID', 'ID_Escuela');
    }
    public function rol()
{
    return $this->belongsTo(Role::class, 'id_role', 'id_role');
}   
}

