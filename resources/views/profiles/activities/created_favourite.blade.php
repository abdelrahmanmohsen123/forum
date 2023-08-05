
@component('profiles.activities.activity')

@slot('heading')
{{ $profileUser->name }} Favorited to A
<a href="{{route('threads.show',$activity->subject->id)}}">
    {{$activity->subject->title}}

</a>
@endslot

@slot('body')

{{$activity->subject->favorited->body}}
@endslot
@endcomponent
