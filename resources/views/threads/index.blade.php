@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">



                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        {{-- //@dump($threads) --}}
                        @forelse ($threads as $thread)
                        <div class="card-header my-3">Thread Title</div>
                                <article class="card-body my-2">
                                        <div class="level row">
                                            <h4 class="col-8">
                                                <a href="{{$thread->path()}}"> {{$thread->title}}</a>

                                            </h4>
                                            <a href="{{$thread->path()}}" class="col-3 " style="flex:1">{{ $thread->replies_count }} comments</a>
                                        </div>

                                        <div class="body">
                                            {{$thread->body}}
                                        </div>
                                        <hr>
                                </article>
                                @empty

                                <p>
                                    There are no relevant result in now
                                </p>

                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
