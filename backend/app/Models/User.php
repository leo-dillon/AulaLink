<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';
               // llave primaria
    protected $primaryKey = 'id_user';
    
    protected $fillable = [
        'firsrName',
        'lastName',
        'gender',
        'birthdate',
        'dni',
        'email',
        'address',
        'phone',
        'password',
        'foto',
        'userRole_id',
        'asset',
        'creationDate',
        'lastConnection',
    ];
}