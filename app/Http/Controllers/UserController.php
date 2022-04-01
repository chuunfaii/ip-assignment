<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        if (auth()->user()->isCustomer()) {
            return view('pages.edit-customer-account', ['user' => $user]);
        }

        return view('pages.edit-artist-account', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        $request->validate([
            'first_name' => [
                'required', 
                'string', 
                'max:255'
            ],

            'last_name' => [
                'required', 
                'string', 
                'max:255'
            ],

            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users')->ignore($user->id)
            ],

            'password' => [
                'required',
                'current_password',
            ],

            'new_password' => [
                'nullable', 
                'confirmed',
                'required_with:new_password_confirmation',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ]);

        if (auth()->user()->isCustomer()) {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);

            if ($request->filled('new_password')) {
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);
            }

            $user->save();

            return redirect()->route('edit-account')->with('message', 'Account details have been edited successfully.');
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'bio' => $request->bio
        ]);

        if ($request->filled('new_password')) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }

        $file = $request->file('image_url');

        if (!empty($file)) {
            if ($request->hasFile('image_url')) {
                $filename = $request->file('image_url')->getClientOriginalName();
                $file->move('upload/artists/', $filename);
                $user->image_url = $filename;
            }
        }

        $user->save();

        return redirect()->route('edit-account')->with('message', 'Account details have been edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        auth()->logout();

        if (Artwork::where('user_id', $id)->delete() && $user->delete()) {
            return redirect()->route('home')->with('message', 'Deactivated account successfully.');
        }
    }
}
