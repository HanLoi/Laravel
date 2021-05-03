<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ConversationController extends Controller
{
    public function index()
    {
        $user = User::select('name','id')->where('id', '!=', Auth::user()->id)->get();
        return view('conversations/index', compact('user'));
    }

    /*public function show(int $id){

    }*/
}
