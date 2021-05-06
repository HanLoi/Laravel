<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;

class ConversationController extends Controller
{

    private $conversationRepository;

    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
            $this->conversationRepository=$conversationRepository;
            $this->auth=$auth;

    }

    public function index()
    {
        return view('conversations/index',[
            'users'=>$this->conversationRepository->getConversations($this->auth->user()->id)
        ]);
    }

    public function show(User $user)
    {
        return view('conversations/show',[
            'users'=>$this->conversationRepository->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages'=>$this->conversationRepository->getMessageFor($this->auth->user()->id, $user->id)->get(),
           
        ]);
    }

    public function store (User $user, Request $request)
    {
        $this->conversationRepository->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('conversation.show', ['user' => $user->id ]));    
    }
}
