<?php

namespace Modules\Saas\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Saas\Models\Admin;

class AuthService
{
    /**
     * Email Checking
     */
    private function emailExists(string $email): ?Admin
    {
        return Admin::where('email', $email)->first();
    }

    /**
     * Duplicate Email checking
     */
    public function duplicateCheck(string $email): void
    {
        if ($this->emailExists($email)) {
            throw new Exception("Email already is in use", 400);
        }
    }

    /**
     * Register new account
     */
    public function register(array $data): Admin
    {
        return Admin::create($data);
    }

    /**
     * Login to existing account
     */
    public function attemptLogin(string $email, string $password): Admin
    {
        if (!$user = $this->emailExists($email)) {
            throw new Exception("Email not found", 404);
        }

        if (!Hash::check($password, $user->password)) {
            throw new Exception("Invalid Password", 400);
        }

        Auth::guard('saas')->login($user);

        return $user;
    }

    /**
     * Logout current user
     */
    public function logout(): void
    {
        Auth::guard('saas')->logout();
    }
}
