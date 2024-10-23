<?php

namespace App\Http\Controllers\processing;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgottenPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    private AuthInterface $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::beginTransaction();

        try {
            $user = $this->authInterface->login($data);

            if (!$user) {
                DB::rollBack();
                return back()->withErrors([
                    'error' => 'Email ou mot de passe invalide.s.',
                ])->withInput();
            }

            DB::commit();

            return redirect()->route('dashboard');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Un problème est survenue lors du traitement. Reprenez s\'il vous plaît !',
            ])->withInput();
        }

    }

    public function forgottenPassword(ForgottenPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
        ];

        DB::beginTransaction();

        try {
            $user = $this->authInterface->forgottenPassword($data['email']);

            if (!$user) {
                DB::rollBack();
                return back()->withErrors([
                    'error' => 'Email non trouvé.',
                ])->withInput();
            }

            session()->put('email', $data['email']);

            DB::commit();

            return redirect()->route('otpCode');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Un problème est survenue lors du traitement. Reprenez s\'il vous plaît !',
            ])->withInput();
        }

    }

    public function otpCode(Request $request)
    {
        $data = [
            'email' => session()->get('email'),
            'code' => $request->code,
        ];

        DB::beginTransaction();

        try {
            $otpCode = $this->authInterface->otpCode($data);

            if (!$otpCode) {
                DB::rollBack();
                return back()->withErrors([
                    'error' => 'Code de confirmation invalide.',
                ])->withInput();
            }

            DB::commit();

            return redirect()->route('newPassword');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Un problème est survenue lors du traitement. Reprenez s\'il vous plaît !',
            ])->withInput();
        }
    }

    public function newPassword(NewPasswordRequest $request)
    {
        $data = [
            'email' => session()->get('email'),
            'code' => session()->get('code'),
            'password' => $request->password
        ];


        DB::beginTransaction();

        try {
            $otpCode = $this->authInterface->otpCode($data);

            if (!$otpCode) {
                DB::rollBack();
                return back()->withErrors([
                    'error' => 'Code de confirmation invalide.',
                ])->withInput();
            }

            $this->authInterface->newPassword($data);

            DB::commit();

            return redirect()->route('login');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Un problème est survenue lors du traitement. Reprenez s\'il vous plaît !',
            ])->withInput();
        }
    }
}
