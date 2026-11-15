<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Semua logika autentikasi MABU ada di sini:
 * login, register, logout, lupa kata sandi, reset kata sandi,
 * verifikasi email, konfirmasi kata sandi, dan ganti kata sandi.
 */
class AuthController extends Controller
{
    /* ==================================================================
     * LOGIN
     * ================================================================== */

    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login. Field "email" boleh berisi email ATAU nomor HP.
     *
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('mabu.profil', absolute: false))
            ->with('success', 'Selamat datang kembali di MABU!');
    }

    /**
     * Logout dan hapus sesi.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar.');
    }

    /* ==================================================================
     * REGISTER
     * ================================================================== */

    /**
     * Tampilkan halaman daftar akun.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Proses daftar akun baru. Menyimpan phone dan role.
     *
     * @throws ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'string', 'in:jobseeker,employer,student,partner'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'phone.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'phone.unique' => 'Nomor HP ini sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $role = in_array($validated['role'] ?? '', ['employer', 'partner']) ? 'employer' : 'jobseeker';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $role,
            'password' => Hash::make($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('mabu.profil')
            ->with('success', 'Pendaftaran akun berhasil! Selamat datang di MABU.');
    }

    /* ==================================================================
     * LUPA & RESET KATA SANDI
     * ================================================================== */

    /**
     * Tampilkan halaman lupa kata sandi.
     */
    public function showForgotPasswordForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Kirim tautan reset ke email.
     *
     * @throws ValidationException
     */
    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    /**
     * Tampilkan halaman buat kata sandi baru.
     */
    public function showResetPasswordForm(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Simpan kata sandi baru.
     *
     * @throws ValidationException
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    /* ==================================================================
     * VERIFIKASI EMAIL
     * ================================================================== */

    /**
     * Tampilkan halaman verifikasi email.
     */
    public function showVerifyEmail(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route('mabu.profil', absolute: false))
            : view('auth.verify-email');
    }

    /**
     * Kirim ulang email verifikasi.
     */
    public function sendVerificationEmail(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('mabu.profil', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }

    /**
     * Tandai email user sebagai terverifikasi.
     */
    public function verifyEmail(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('mabu.profil', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('mabu.profil', absolute: false).'?verified=1');
    }

    /* ==================================================================
     * KONFIRMASI & GANTI KATA SANDI
     * ================================================================== */

    /**
     * Tampilkan halaman konfirmasi kata sandi.
     */
    public function showConfirmPasswordForm(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Konfirmasi kata sandi user.
     *
     * @throws ValidationException
     */
    public function confirmPassword(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('mabu.profil', absolute: false));
    }

    /**
     * Ganti kata sandi dari halaman profil.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
