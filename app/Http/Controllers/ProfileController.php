<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $qr = str_replace(' ', '', $request->user()->name . $request->user()->email . $request->user()->nic);
        return view('profile.edit', [
            'user' => $request->user(),
            'qr' => $qr
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function password_reset(Request $request): View
    {
        return view('profile.password_reset', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $data = $request->all();
        $request->user()->title = $data['title'];
        $request->user()->nickname = $data['nickname'];
        $request->user()->dob = $data['dob'];
        $request->user()->nic = $data['nic'];
        $request->user()->residential_address = $data['residential_address'];
        $request->user()->work_address = $data['work_address'];
        $request->user()->mobile = $data['mobile'];
        $request->user()->work_contact = $data['work_contact'];
        $request->user()->residence_contact = $data['residence_contact'];
        $request->user()->website = $data['website'];
        $request->user()->marital_status = $data['marital_status'];
        $request->user()->beneficiary = $data['beneficiary'];
        if (strlen($request->user()->nic) > 0) {
            $request->user()->qrcode = true;
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
