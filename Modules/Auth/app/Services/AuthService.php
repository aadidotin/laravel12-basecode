<?php

namespace Modules\Auth\Services;

use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;

class AuthService
{
    /**
     * Email Checking
     */
    private function emailExists(string $email): ?User
    {
        return User::where('email', $email)->first();
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
    public function register(array $data): User
    {
        return User::create($data);
    }

    /**
     * Login to existing account
     */
    public function login(string $email, string $password): User
    {
        if (!$user = $this->emailExists($email)) {
            throw new Exception("Email not found", 404);
        }

        if (!Hash::check($password, $user->password)) {
            throw new Exception("Invalid Password", 400);
        }

        return $user;
    }
}
