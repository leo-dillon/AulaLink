<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRolEscuela extends Model
{
    use HasFactory;

    protected $table = 'user_rol_school';
    protected $primaryKey = 'id_user_rol_school';

    protected $fillable = [
        'id_user',
        'id_school',
        'id_role',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function escuela()
    {
        return $this->belongsTo(School::class, 'id_school', 'id_school');
    }
    public function rol()
{
    return $this->belongsTo(Role::class, 'id_role', 'id_role');
}   
}

