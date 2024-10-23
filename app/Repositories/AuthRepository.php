<?php

namespace App\Repositories;
use App\Interfaces\AuthInterface;
use App\Mail\OtpCodeMail;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class AuthRepository implements AuthInterface
{
    public function login(array $data)
    {
        return Auth::attempt($data);
    }
    public function logout()
    {
        Auth::logout();
    }

    public function forgottenPassword(string $email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            OtpCode::where('email', $email)->delete();

            $otpCode = [
                'email' => $email,
                'code' => rand(121221, 989998)
            ];

            OtpCode::create($otpCode);

            Mail::to($user->email)->send(new OtpCodeMail($otpCode['code']));

            return true;
        }

        return false;
    }
    public function otpCode(array $data)
    {
        $otpCode = OtpCode::where('email', $data['email'])->first();

        if ($otpCode)
            if (Hash::check($data['code'], $otpCode->code)) {
                session()->put('code', $data['code']);
                return true;
            }


        return false;
    }
    public function newPassword(array $data)
    {
        User::where('email', $data['email'])->update(['password' => Hash::make($data['password'])]);
        OtpCode::where('email', $data['email'])->delete();
    }
}
