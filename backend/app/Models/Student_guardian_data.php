<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_guardian_data extends Model
{
    use HasFactory;

    protected $table        = 'student_guardian_data';
    protected $primaryKey   = 'id_student_guardian_data';
    
    protected $fillable     = [
        'is_emergency_contact',
        'is_financial_student',
        'id_user_rol_school',
        'lives_with_student',
        'relationship_type',
        'is_legal_guardian',
        'notes',
    ];

    public function user_rol_school(){
        return $this -> belongsTo(UsuarioRolEscuela::class, 'id_user_rol_school', 'ID_UserRolEscuela');
    }
}
