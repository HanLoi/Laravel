<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessage;
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
            'users'=>$this->conversationRepository->getConversations($this->auth->user()->id),
            'unread'=>$this->conversationRepository->unreadCount($this->auth->user()->id)
        ]);
    }

    public function show(User $user)
    {
        $message = $this->conversationRepository->getMessageFor($this->auth->user()->id, $user->id)->paginate(50);
        $unread=$this->conversationRepository->unreadCount($this->auth->user()->id);
        if(isset($unread[$user->id]))
        {
            $this->conversationRepository->readAllFrom($user->id, $this->auth->user()->id);
            unset ($unread[$user->id]);
        }
        return view('conversations/show',[
            'users'=>$this->conversationRepository->getConversations($this->auth->user()->id), 
            'user' => $user,
            'messages'=>$message,
            'unread'=>$unread
           
        ]);
    }

    public function store (User $user, StoreMessage $request)
    {
        $this->conversationRepository->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('conversation.show', ['user' => $user->id ]));    
    }
}
