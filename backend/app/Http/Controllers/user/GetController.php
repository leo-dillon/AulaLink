<?php

namespace App\Http\user\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function getUser(int $id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
