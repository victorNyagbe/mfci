<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index():View
    {
        $activities = Activity::orderByDesc('id')->get();
        return view('activities', compact("activities"));
    }
}
