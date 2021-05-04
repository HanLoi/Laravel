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
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>