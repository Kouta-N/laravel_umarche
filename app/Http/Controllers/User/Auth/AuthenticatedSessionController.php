<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $collaborators = [
            [
                'first_name' =>  '',
                'last_name' =>  '',
                'middle_name' => '',
                'suffix' => '',
                'email' => '',
                'affiliation' => '',
            ],
            [
                'first_name' =>  '',
                'last_name' =>  '',
                'middle_name' => '',
                'suffix' => '',
                'email' => '',
                'affiliation' => '',
            ]
        ];

        $testCollaborators = array();
        for ($i = 0; $i < 51; $i++) {
            $testCollaborators = array_merge(
                $testCollaborators,
                array([
                    'first_name' => 'test',
                    'last_name' => 'test',
                    'middle_name' => 'test',
                    'suffix' => 'test',
                    'email' => 'test@test.com',
                    'affiliation' => 'test',
                ])
            );
        }

        $test = Str::random(51);


        dd($test);

        return view('user.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('users')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}