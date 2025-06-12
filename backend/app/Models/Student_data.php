<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_data extends Model
{
    use HasFactory;

    protected $table        = 'student_data';
    protected $primaryKey   = 'id_student_data';

    protected $fillable     = [
        'id_user_rol_school',
        'enrollment_number',
        'academic_status',
        'enrollment_date',
        'current_year',
        'student_type',
        'shift',
    ];

    public function user_rol_school(){
        return $this -> belongsTo(UsuarioRolEscuela::class, 'id_user_rol_school', 'id_user_rol_school');
    }
}
