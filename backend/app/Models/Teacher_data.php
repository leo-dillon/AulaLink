<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_data extends Model
{
    use HasFactory;

    protected $table        = 'teacher_data';
    protected $primaryKey   = 'id_teacher_data';

    protected $fillable     = [
        'id_user_rol_school',
        'cuil',
        'degree_title',
        'file_number',
        'hire_date',
        'notes',
    ];

    public function user_rol_school(){
        return $this -> belongsTo(UsuarioRolEscuela::class, 'id_user_rol_school', 'id_user_rol_school');
    }
}
