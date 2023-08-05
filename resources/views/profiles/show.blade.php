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
                @foreach ($activities as $date => $activity)
                <div class="card  my-3">
                    <h3>{{ $date }}</h3>
                    <div class="card-header">


                        @foreach ($activity as $record)
                            @if (view()->exists("profiles.activities.{$record->type}"))
                                @include("profiles.activities.{$record->type}" ,['activity'=>$record])

                            @endif

                        @endforeach
                    </div>


                    {{-- {{ $threads->links('pagination::bootstrap-5') }} --}}


                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




@endsection
