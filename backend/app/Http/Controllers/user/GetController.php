<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function getUser(int $id){
        $user = User::findOrFail($id);
        $responseUser = [
            "birthdate"     => $user -> birthdate,
            "firstName"     => $user -> firstName,
            "lastName"      => $user -> lastName,
            "address"       => $user -> address,
            "gender"        => $user -> gender,
            "phone"         => $user -> phone,            
            "photo"         => $user -> photo,
            "dni"           => $user -> dni,
        ];
        return response()->json($responseUser);

    }
}
