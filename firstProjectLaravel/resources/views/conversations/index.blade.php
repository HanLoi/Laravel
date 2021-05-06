

<x-app-layout>

    <x-slot name="header">
        <h2 class="">
           Your header title
        </h2>
    </x-slot>


       <div class="container">
            @include('conversations.user',['users'=>$users, 'unread'=> $unread])
       </div>
 


</x-app-layout>
