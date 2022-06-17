<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest\StoreCityRequest;
use App\Http\Requests\Api\V1\UserRequest\UpdateUserRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserController extends Controller
{
    public function addCity(StoreCityRequest $request, Authenticatable $user)
    {
        if($user)
        {
            $user->city_id = $request->city_id;
            $user->save();

            return response()->json(["success" => true, "message" => 'City updated Successfully'], 200);
        }
        return response()->json(["success" => false, "message" => 'User not found'], 200);
    }

    public function show(Authenticatable $user)
    {
        if($user)
        {
            return response()->json(["success" => true, "message" => new UserResource($user) ], 200);
        }
        return response()->json(["success" => false, "message" => "User not found" ], 200);
    }

    public function update(UpdateUserRequest $request, Authenticatable $user)
    {
        if($user)
        {
            $user->name = $request->name;
            $user->alternate_number = $request->alternate_number;
            $user->email = $request->email;
            $user->save();

            return response()->json(["success" => true, "message" => 'User updated Successfully'], 200);
        }
        return response()->json(["success" => false, "message" => 'User updation failed'], 200);
    }
}
