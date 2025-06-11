<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table        = 'subject';
    protected $primaryKey   = 'id_subject';

    protected $fillable     = [
        'name',
    ];

}
