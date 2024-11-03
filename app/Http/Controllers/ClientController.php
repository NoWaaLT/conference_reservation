<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function submit(Request $request, $conference) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        return response()->json([
            'message' => 'Registration succesful!',
            'conference_id' => $conference,
            'data' => $request->all(),
        ]);
    }
}
