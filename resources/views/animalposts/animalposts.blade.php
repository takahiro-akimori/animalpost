<ul class="list-unstyled">
    @foreach ($animalposts as $animalpost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($animalpost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $animalpost->user->name, ['id' => $animalpost->user->id]) !!} <span class="text-muted">posted at {{ $animalpost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($animalpost->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $animalpost->user_id)
                        {!! Form::open(['route' => ['animalposts.destroy', $animalpost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $animalposts->render('pagination::bootstrap-4') }}