<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return User::find(1);
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
                'password' => $user['password']
            ]);

            return response()->json(['data' => $user]);
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
