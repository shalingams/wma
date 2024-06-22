<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dashboard(Request $request): View
    {
        $qr = str_replace(' ', '', $request->user()->name . $request->user()->email . $request->user()->nic);
        return view('dashboard', [
            'user' => $request->user(),
            'qr' => $qr
        ]);
    }

}
