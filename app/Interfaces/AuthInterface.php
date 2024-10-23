<?php

namespace App\Interfaces;

interface AuthInterface
{
    public function login(array $data);
    public function logout();
    public function forgottenPassword(string $email);
    public function otpCode(array $data);
    public function newPassword(array $data);
}
