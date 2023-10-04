<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if($request->guard == 'web') {
            $user = User::create($data);
        }

        if($request->guard == 'teacher') {
            $user = Teacher::create($data);
        }

        if($request->guard == 'admin') {
            $user = Admin::create($data);
        }


        event(new Registered($user));

        Auth::guard($request->guard)->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
