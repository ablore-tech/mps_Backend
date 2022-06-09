<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest\UpdateUserRequest;
use App\Http\Requests\StoreCityRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addCity(StoreCityRequest $request)
    {
        $user = User::find($request->user_id);
        $user->city_id = $request->city_id;
        $user->save();

        return response()->json([
            $user,
            200
        ]);
    }

    public function show(User $user)
    {
        return response()->json([new UserResource($user), 200]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->alternate_number = $request->alternate_number;
        $user->email = $request->email;
        $user->save();
        
        return response()->json([new UserResource($user), 200]);
    }
}
