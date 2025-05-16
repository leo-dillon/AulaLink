<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class HomeRedirectController extends Controller
{
 public function __invoke()
    {
        if (Auth::check()) {
            return redirect()->route('home.index');
        }

        return redirect()->route('home.onepager');
    }

    
}