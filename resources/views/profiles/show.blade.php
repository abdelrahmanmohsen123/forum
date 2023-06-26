@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-auto">
            <div class="page-header">
                <h1>
                    {{  $profileUser->name }}
                    <small>Since {{  $profileUser->created_at->diffForHumans() }}</small>
                    <hr>
                </h1>
                @foreach ($threads as $thread)
                <div class="card  my-3">
                    <div class="card-header">

                        {{ $profileUser->name }} posted
                        <a href="{{route('threads.show',$thread->id)}}">
                            {{$thread->title}}
                        </a>

                    </div>

                    <div class="card-body">
                        <article class="card-body">

                                <h4 style="display: flex">
                                    <span class="flex" >
                                        {{$thread->title}}
                                    </span>
                                    <span >
                                        {{ $thread->created_at->diffForHumans() }}
                                    </span>


                                </h4>
                                <div class="body">
                                    {{$thread->body}}
                                </div>
                                <hr>
                        </article>
                    </div>
                    {{ $threads->links('pagination::bootstrap-5') }}


                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




@endsection
