<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\User;

class UserController extends Controller
{
    public function addCity(StoreCityRequest $request)
    {
        $user = User::find($request->user_id);
        $user->city_id = $request->city_id;
        $user->save();

        return response()->json([
            $user,
            201
        ]);
    }
}
