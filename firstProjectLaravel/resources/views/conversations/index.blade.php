

<x-app-layout>

    <x-slot name="header">
        <h2 class="">
           Your header title
        </h2>
    </x-slot>

 
        <div class="col-md-3">
            <div class="list-group">
            @foreach($user as $user)
                <a class="list-group-item" href="{{ route('conversation.show', $user->id) }}"> {{$user->name}}</a>
            @endforeach
            </div>
        </div>







</x-app-layout>
