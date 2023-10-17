<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\User;
use App\Events\CreateUserFarmerEvent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        // Create a new user
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type' => $request->input('user_type'),
        ]);


        // Dispatch the event to create a farmer if user_type is 'farmer'
        if ($request->input('user_type') === 'farmer') {
            Farmer::create([
                'user_id' => $user->id,
            ]);

//            return response()->json(['message' => 'Farmer created successfully'], 201);
//            echo $user;
        }

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function show(){
        return User::paginate(10);
    }
}
