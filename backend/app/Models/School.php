<?php
// app/Models/School.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
   protected $table = 'schools';
               // llave primaria
    protected $primaryKey = 'id_school';
    protected $fillable = [
        'name',
        'CUE',
        'address',
        'city',
        'province',
        'phones',
        'emails',
        'level',
        'type',
        'id_user',
        'active'
    ];
    public function headMaster(){
        return $this -> belongsTo(User::class, 'id_user', 'users');
    }
}


