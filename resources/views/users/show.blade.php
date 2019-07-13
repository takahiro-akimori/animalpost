@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            <h2 class="mt-4 mb-4">Hello,I'm {{$user->animals}}</h2>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        
        <div class="card col-sm-6 mt-4">
            ここにprofile文を入れる
        </div>
    </div>
    <p></p>
    <div>
        <ul class="nav nav-tabs">
            <li class="btn col-sm-4"><a href="#" class="nav-link">Post</a></li>
            <li class="btn col-sm-4"><a href="#" class="nav-link">Follow</a></li>
            <li class="btn col-sm-4"><a href="#" class="nav-link">Favorite</a></li>
        </ul>
        @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'animalposts.store']) !!}
                <div class="form-group row mt-4">
                    <div class="text-center border col-sm-3 pt-5 " style="height: 160px;">
                        <a href="#" class="nav-link">画像を選択</a>
                    </div>    
                    <div class="form col-sm">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('Post', ['class' => 'btn col-sm-3 btn-primary float-right']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            @endif
            <p class=" border-top">
            @if (count($animalposts) > 0)
                @include('animalposts.animalposts', ['animalposts' => $animalposts])
            @endif
    </div>
    
@endsection