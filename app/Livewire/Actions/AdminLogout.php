<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;

class AdminLogout
{
    public function __invoke()
    {
        Auth::guard('admin')->logout(); // if using a separate guard
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
