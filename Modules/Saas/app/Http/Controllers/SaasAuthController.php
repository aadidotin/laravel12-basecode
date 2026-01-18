<?php

namespace Modules\Saas\Http\Controllers;

use Exception;
use Modules\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Saas\Services\AuthService;

class SaasAuthController extends Controller
{
    public function __construct(private AuthService $auth) {}

    /**
     * Display a listing of the resource.
     */
    public function loginPage()
    {
        return Inertia::render('Saas::SignIn');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function login(Request $request)
    {
        try {
            // 1. Validate request
            $credentials = $request->validate([
                'email'    => ['required', 'email'],
                'password' => ['required'],
                'remember' => ['nullable', 'boolean'],
            ]);

            if ($request->filled('remember')) {
                $request->session()->put('remember', true);
            }

            if ($this->auth->attemptLogin($credentials['email'], $credentials['password'])) {
                return redirect()->intended(route('saas.index'))->with('success', 'Login Successful');
            }

            return redirect()->back()->with('error', 'Invalid Credentials');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Logout Current User
     */
    public function logout(Request $request)
    {
        try {
            $this->auth->logout();

            // 🔐 VERY IMPORTANT
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return to_route('saas.login'); // or home page

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
