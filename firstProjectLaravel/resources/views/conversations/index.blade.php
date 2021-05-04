

<x-app-layout>

    <x-slot name="header">
        <h2 class="">
           Your header title
        </h2>
    </x-slot>


       <div class="container">
            @include('conversations.user')
       </div>



</x-app-layout>
