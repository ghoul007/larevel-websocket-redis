@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @foreach($groups as $g)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <strong>{{$g->name}}</strong>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">

                            @foreach($g->users as $user)
                                <a href="{{route('spy',$user->id)}}">
                                    <li class="list-group-item">{{$user->name}}</li>
                                </a>
                            @endforeach
                        </ul>
                        <form action="{{route('notify',$g->id)}}" method="post">
                            {{csrf_field()}}
                        <button class="btn btn-primary">notify</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

    </div>


@endsection