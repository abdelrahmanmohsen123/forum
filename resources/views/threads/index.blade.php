@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thread Title</div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {{-- //@dump($threads) --}}
                        @foreach ($threads as $thread)

                                <article class="card-body">

                                        <h4>
                                            <a href="{{$thread->path()}}"> {{$thread->title}}</a>

                                        </h4>
                                        <div class="body">
                                            {{$thread->body}}
                                        </div>
                                        <hr>
                                </article>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
