<?php
// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'ID_Rol';

    protected $fillable = ['Nombre', 'Definicion'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_rol_escuela', 'Rol_ID', 'Usuario_ID')
                    ->withPivot('Escuela_ID')
                    ->withTimestamps();
    }
}
