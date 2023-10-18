<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\StoreManager;
use App\Models\User;
use Illuminate\Http\Request;

class StoreManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $storeManagers = StoreManager::with('user')->get();
        return response()->json(['data' => $storeManagers], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->input('user_id'));


        if ($user->user_type === 'store_manager'){
            $store_manager = StoreManager::create([
                'user_id' => $request->input('user_id'),
            ]);

            $manager = StoreManager::with('user')->get();

            return response()->json(['message' => 'Manager created successfully', 'manager' => $store_manager], 201);
        }else {
            return response()->json(['message' => 'Error, User needs to be of type Manager'], 400);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
