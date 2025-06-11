<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_class extends Model
{
    protected $table        = "student_class";
    protected $primaryKey   = "id_student_class";

    protected $fillable     = [
        'id_student_data',
        'id_school_class',
    ];

    public function student_data(){
        return $this -> belongsTo(Student_data::class, 'id_student_data', 'id_student_data');
    }

    public function school_class() {
        return $this -> belongsTo(School_class::class, 'id_school_class', 'id_school_class');
    }
}
