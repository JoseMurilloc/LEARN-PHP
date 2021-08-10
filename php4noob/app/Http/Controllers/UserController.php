<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $user = User::find(1);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = $request->all();

            $this->validate($request, [
                'email' => 'required|email'
            ]);

            User::create([
                'name' => $user['name'],
                'email'  => $user['email'],
                'password' => Hash::make($user['password'])
            ]);

            return response()->json(['data' => $user]);
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
