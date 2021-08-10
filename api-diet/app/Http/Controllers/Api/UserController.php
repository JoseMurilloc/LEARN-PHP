<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return UserCollection
     */
    public function index(Request $request): UserCollection
    {
        $user = $this->user;

        if ($request->has('conditions')) {
            $expressions = explode(';', $request->get('conditions'));

            foreach ($expressions as $e) {
                $exp = explode('=', $e);
                $user = $user->where($exp[0], $exp[1]);
            }
        }

        if ($request->has('fields')) {
            $fields = $request->get('fields');
            $user = $user->selectRaw($fields);
        }

        return new UserCollection($user->paginate(10));
    }

    public function update(Request $request, $id)
    {
        $this->user->find($id)->update($request->all());
        return response()->json(['message' => 'user updated with success']);
    }


    public function show($id): UserResource
    {
        $user = $this->user->find($id);
        return new UserResource($user);
    }
}
