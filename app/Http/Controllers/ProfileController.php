<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Fill in the validated fields (first_name, last_name, bio)
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->bio = $request->input('bio');

    // Handle profile image upload
    if ($request->hasFile('profile_photo')) {
        // Delete the old profile image if exists (optional)
        if ($user->profile_photo && file_exists(public_path('uploads/profile_images/' . $user->profile_photo))) {
            // Remove the old image from the public directory
            unlink(public_path('uploads/profile_images/' . $user->profile_photo));
        }

        // Generate a unique name for the new image
        $imageName = time() . '.' . $request->file('profile_photo')->extension();

        // Move the new image to the 'public/uploads/profile_images' directory
        $request->file('profile_photo')->move(public_path('uploads/profile_images'), $imageName);

        // Update the user's profile image name (store only the name, no path)
        $user->profile_photo = $imageName;
    }

    // If the email is being updated, set the email_verified_at to null (require verification)
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Save the updated user
    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        // Log the user out after deleting their account
        Auth::logout();

        // Delete the user's data from the database
        $user->delete();

        // Invalidate and regenerate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
