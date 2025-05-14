<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function getUserRoles($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $roles = $user->roles()->with('permissions')->get();

        return response()->json([
            'user_id' => $userId,
            'user_name' => $user->name,
            'roles' => $roles
        ]);
    }
}
