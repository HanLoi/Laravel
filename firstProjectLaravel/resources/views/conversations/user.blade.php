        <div class="col-md-3">
            <div class="list-group">
            @foreach($users as $user)
                <a class="list-group-item" href="{{ route('conversation.show', $user->id) }}">
                {{$user->name}}
                @if(isset($unread[$user->id]))
                <span class="badge badge-pill badge-primary">{{$unread[$user->id]}}</span>
                @endif
                </a>
            @endforeach
            </div>
        </div>
