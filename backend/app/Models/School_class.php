<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_class extends Model
{
    protected $table        = 'school_class';
    protected $primaryKey   = 'id_school_class';

    protected $fillable     = [
        'id_subject',
        'id_user_teacher',
        'id_user_substitute_teacher',
        'id_school',
        'grade',
        'section',
        'academic_year',
        'shift',
    ];

    public function subject (){
        return $this -> belongsTo(Subject::class, 'id_subject', 'id_subject');
    }

    public function teacher(){
        return $this -> belongsTo(UsuarioRolEscuela::class, 'id_user_teacher', 'id_user_rol_school');
    }

    public function substitute_teacher() {
        return $this -> belongsTo(UsuarioRolEscuela::class, 'id_user_substitute_teacher', 'id_user_rol_school');
    }

    public function school(){
        return $this -> belongsTo(School::class ,'id_school', 'id_school');
    }

}
