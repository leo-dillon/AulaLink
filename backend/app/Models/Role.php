<?php
// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id_role';

    protected $fillable = ['name'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_rol_escuela', 'id_role', 'id_user')
                    ->withPivot('id_school')
                    ->withTimestamps();
    }
}
