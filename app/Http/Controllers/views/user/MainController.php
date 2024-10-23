<?php

namespace App\Http\Controllers\views\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard() {
        return view('user.dashboard');
    }
}
