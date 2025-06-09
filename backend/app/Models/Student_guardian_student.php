<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_guardian_student extends Model
{
    use HasFactory;

    protected $table        = "student_guardian_student";
    protected $primaryKey   = "id_student_guardian_student";

    protected $fillable     = [
        'id_student_data',
        'id_student_guardian_data'
    ];

    public function student_data(){
        return $this -> belongsTo(Student_data::class, 'id_student_data', 'id_student_data');
    }

    public function student_guardian_data(){
        return $this -> belongsTo(Student_guardian_data::class, 'id_student_guardian_data', 'id_student_guardian_data');
    }
}
