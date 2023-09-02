<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
        ]);

        $users = User::findOrFail($id);
        $users->update($request->all());

        return response()->json(['data' => $users]);
    }
}
