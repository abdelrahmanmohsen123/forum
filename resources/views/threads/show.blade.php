@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-8 mb-3">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <span class="flex col-10" style="display: flex">
                            <a href="{{route('profiles.show',$thread->creator)}}">
                                {{$thread->creator->name}}
                            </a>
                        </span>
                        @can('update',$thread)



                        <div class="col-1">
                            <form action="{{ route('threads.destroy',$thread->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>




                    posted
                    <a href="{{ route('threads.show',$thread->id) }}">

                    </a>
                    {{$thread->title}}</div>
                    <span>

                    </span>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">


                            <article class="card-body">

                                    <h4>

                                    </h4>
                                    <div class="body">
                                        {{$thread->body}}
                                    </div>
                                    <hr>
                            </article>


                </div>


            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">


                                <article class="card-body">


                                        <div class="body">
                                            <p>
                                                this is thread was published {{$thread->created_at->diffForHumans()}}
                                                by <a href="">{{ $thread->creator->name }}</a> ,and currently has
                                                {{$thread->replies_count}} Comments
                                            </p>

                                        </div>

                                </article>


                    </div>


                </div>
            </div>

            @if(count($thread->replies) >0)

            <div class="card-body my-3 ">
                    @foreach ($replies as $reply)

                            @include('threads.reply')


                    @endforeach

                {{ $replies->links('pagination::bootstrap-5') }}






            </div>
            @endif
                @if(auth()->check())




                        <div class="card-body my-3 ">
                            <form action="{{route('add_reply_to_thread',['channel'=>$channelId,'thread'=>$thread->id])}}" method="post">
                                @csrf
                                <label for="body">Body : </label>
                                <div class="form-group">
                                    {{-- <input type="text" name="body" class="form-control" placeholder="enter reply"> --}}
                                    <textarea  id="body" name="body" class="form-control" placeholder="Have somthing to say ? " cols="5" rows="5">
                                    </textarea>
                                </div>
                                <button type="submit" >Submit</button>
                            </form>

                        </div>


                @else

            <p class="text-center">please <a href="{{route('login')}}">sign in</a>  to partisipate this discussion</p>
                @endif

        </div>

    </div>





</div>
@endsection
