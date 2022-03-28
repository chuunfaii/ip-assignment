<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $id = auth()->user()->id;

        $user = User::find($id);


        if (auth()->user()->isCustomer()) {
            return view('pages.edit-account', ['user' => $user]);
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'current_password'],
            'new_password' => ['nullable', 'confirmed', 'required_with:new_password_confirmation', Password::defaults()],
        ]);

        if(auth()->user()->isCustomer()){
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

            return redirect()->route('edit-account');
        }
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'bio'=>$request->bio
            
        ]);


        if ($request->filled('new_password')) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }

        $file = $request ->file('image_URL');

        if(!empty($file)){
            if($request->hasFile('image_URL')){
                $filename = $request->file('image_URL')->getClientOriginalName();
                $file-> move('upload/artists/', $filename);
                $user-> image_URL = $filename;
            }
            
        }

        $user->save();

        return redirect()->route('edit-account');
        
    }
}
