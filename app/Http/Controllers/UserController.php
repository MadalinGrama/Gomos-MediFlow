<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        // Alte operații legate de afișarea profilului

        return view('user.profile', compact('user'));
    }
}
