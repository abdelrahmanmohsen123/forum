@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$thread->creator->name}}
                    posted
                    {{$thread->title}}</div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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

            </div>
        </div>
    </div>
    @if(count($thread->replies) >0)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thread reply</div>




                <div class="card-body">
                    @foreach ($thread->replies as $reply)

                            @include('threads.reply')


                    @endforeach
                </div>





                </div>

            </div>
        </div>
    </div>
    @endif

    @if (auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thread reply form</div>




                    <div class="card-body my-3">
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
                </div>

            </div>
        </div>
    </div>
    @else

    <p class="text-center">please <a href="{{route('login')}}">sign in</a>  to partisipate this discussion</p>
    @endif

</div>
@endsection
