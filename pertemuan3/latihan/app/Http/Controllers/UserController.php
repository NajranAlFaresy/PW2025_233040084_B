<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::limit(5)->get(); 
        return view('users', compact('users'));
    }
}