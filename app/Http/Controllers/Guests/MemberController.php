<?php

namespace App\Http\Controllers\Guests;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::all();
        return view('members', compact("members"));
    }
}
