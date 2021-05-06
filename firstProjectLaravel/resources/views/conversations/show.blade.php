<x-app-layout>

    <x-slot name="header">
        <h2 class="">
           Your header title
        </h2>
    </x-slot>

  
       <div class="container">
            <div class="row">
                @include('conversations.user', ['users'=>$users, 'unread'=> $unread])
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{$user->name}}</div>
                        <div class="card-body conversation">
                            @if($messages->hasMorePages())
                                <a href="" class="btn btn-light">
                                    <div class="text-center">
                                        <a href="{{ $messages->nextPageUrl()}}" class="btn btn-light">
                                            Voir les messages précedents
                                        </a>
                                    </div>
                                </a>
                            @endif
                            @foreach ($messages as $message)
                                <div class='row'>
                                    <div class='col-md-10 {{$message->from->id !== $user->id ? 'offset-md-2 text-right' : ''}}'>
                                        <hr>
                                        <p>
                                            <strong>{{ $message->from->name}}</strong>
                                            {!! nl2br(e($message->content)) !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @if($messages->previousPageUrl())
                            <a href="" class="btn btn-light">
                                <div class="text-center">
                                    <a href="{{ $messages->previousPageUrl()}}" class="btn btn-light">
                                        Voir les messages suivant
                                    </a>
                                </div>
                            </a>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="content" placeholder="Ecrivez votre message" class="from-control"></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>