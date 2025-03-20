<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
        ]);

        $password = Str::random(10);
        $data['password'] = Hash::make($password);

        $user = User::create($data);

        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));

        return redirect()->route('admin.user.index')                                                                            ;
    }

}
