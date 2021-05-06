<x-app-layout>

    <x-slot name="header">
        <h2 class="">
           Your header title
        </h2>
    </x-slot>

  
       <div class="container">
            <div class="row">
                @include('conversations.user', ['users'=>$users])
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{$user->name}}</div>
                        <div class="card-body conversation">
                            @foreach ($messages as $message)
                                <div class='row'>
                                    <div class='col-md-10 {{$message->from->id !== $user->id ? 'offset-md-2 text-right' : ''}}'>
                                        <p>
                                            <strong>{{ $message->from->name}}</strong>
                                            {{ $message->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
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