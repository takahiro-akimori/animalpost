<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $animalposts = $user->animalposts()->orderBy('created_at', 'desc')->paginate(10);

         $data = [
            'user' => $user,
            'animalposts' => $animalposts,
        ];

        $data += $this->counts($user);
        
        return view('users.show', $data);
    }

}
