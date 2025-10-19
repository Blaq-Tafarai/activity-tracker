<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetOtpController extends Controller
{
    /**
     * Display the OTP verification form.
     */
    public function create(Request $request): View
    {
        return view('auth.verify-otp', ['email' => $request->query('email')]);
    }

    /**
     * Handle OTP verification.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'otp' => ['required', 'digits:6'],
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user || $user->otp !== $request->otp || now()->greaterThan($user->otp_expires_at)) {
            return back()->withInput($request->only('email'))
                         ->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Clear OTP after verification
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('password.reset', ['token' => 'otp_verified', 'email' => $request->email])
                         ->with('status', 'OTP verified. Please set your new password.');
    }
}
