<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ConversationController extends Controller
{
    public function index()
    {
        $users = User::select('name','id')->where('id', '!=', Auth::id())->get();
        return view('conversations/index', compact('users'));
    }

    public function show(User $user)
    {
        $users = User::select('name','id')->where('id', '!=', Auth::id())->get();
        return view('conversations/show', compact('users', 'user'));
    }
}
