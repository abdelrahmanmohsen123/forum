@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Thread</div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                       <form action="{{route('threads.store')}}" method="post" class="p-3">
                            @csrf
                            <div class="form-group">
                                <label for="channel_id">select channel </label>
                                <select name="channel_id" class="form-select" id="channel_id" required>
                                    @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}" @if (old('channel_id') == $channel->id) selected
                                    @endif>{{ $channel->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <label for="title">Title</label>
                                <input type="text" name="title" required value="{{old('title')}}" id="title" class="form-control">
                            </div>
                            <div class="form-group my-2 ">
                                <label for="body">Body</label>
                                <textarea type="text" name="body" id="body" class="form-control" rows="3" required>
                                    {{old('body')}}
                                </textarea>

                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                        @if (count($errors))
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                        @endforeach


                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
