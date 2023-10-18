<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\StoreManager;
use App\Models\User;
use App\Events\CreateUserFarmerEvent;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {


        try {

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

            }

            if ($request->input('user_type') === 'store_manager'){
                StoreManager::create([
                    'user_id' => $user->id,
                ]);
            }

            return response()->json(['message' => 'User created successfully'], 201);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // MySQL unique constraint violation error code
                return response()->json(['error' => 'This email is already in use.'], 409);
            }

            // Other types of QueryException errors can be handled here if needed

            return response()->json(['error' => 'Something went wrong.', 'err'=> $e], 500);
        }


    }

    public function show(){
        return User::paginate(10);
    }
}
