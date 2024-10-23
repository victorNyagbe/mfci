<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Interfaces\AuthInterface;

class AuthController extends Controller
{
    private AuthInterface $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function login() {
        return view('auth.login');
    }
    public function logout() {
        $this->authInterface->logout();
        return redirect()->route('login');
    }
    public function forgottenPassword() {
        return view('auth.forgottenpassword');
    }
    public function otpCode() {
        return view('auth.otpcode');
    }
    public function newPassword() {
        return view('auth.newpassword');
    }
}
