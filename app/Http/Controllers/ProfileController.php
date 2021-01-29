<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Profile $profile)
    {
        $connection = (auth()->user()) ? auth()->user()->connected->contains($profile->user->id) : false;
        return view('users.profile.index', compact('profile', 'connection'));
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('users.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'bio' => 'required',
            'image' => '',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($profile->image);
            $imagePath = $request['image']->store('profile_images', 'public');
            $image = Image::make(public_path('/storage' . $imagePath))->fit(600, 600);
            $image->save();
        }



        $profile->update([
            'bio' => $request['bio'],
            'image' => $imagePath ?? '',

        ]);
        return redirect()->action('ProfileController@show', $profile->id)->with("success", 'Profile Updated');
    }

    public function destroy($id)
    {
    }
}
