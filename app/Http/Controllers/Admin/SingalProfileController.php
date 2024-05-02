<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SingalProfileController extends Controller
{
    public function singalProfile(){
        return view('profile.profile');
    }

    public function edit()
{
    $user = auth()->user();

    return view('profile.edit', compact('user'));
}


public function update(Request $request)
{
    $user = auth()->user();

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($validatedData);
    return redirect()->route('dashboard.singalProfile')->with('success', 'Profile updated successfully.');
}


}
