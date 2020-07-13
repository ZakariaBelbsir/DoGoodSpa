<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    public function show($id)
    {
        $user = User::find($id)->with('city')->get();
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function update(User $user, Request $request)
    {
        $attributes = [];
        if(request('city_id') && $request['city_id'] !== null){
            $attributes['city_id'] = $request['city_id'];
        }
        if (request('oldPassword') &&  Hash::check($request['oldPassword'], auth()->user()->getAuthPassword())
        ){
            if(request('newPassword')) {
                $attributes['password'] = Hash::make($request['newPassword']);
            }
        } else{
            return response()->json([
                'message' => "L'ancien mot de passe est incorrecte.",
//                'user' => $user
            ], 400);
        }

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if (!empty($attributes)){
            if($user->update($attributes)){
                return response()->json([
                'user' => $user,
                'message' => 'Votre compte a été modifié avec succés'
                ], 200);
            }
        }

        return response()->json([
            'message' => "Votre compte n'a pas été modifié, réessayez plus tard",
//            'user' => $user
        ], 400);
    }
}
