

@component('profiles.activities.activity')

@slot('heading')
{{ $profileUser->name }} Posted A
<a href="{{route('threads.show',$activity->subject->id)}}">
    {{$activity->subject->title}}

</a>
@endslot

@slot('body')

{{$activity->subject->body}}
@endslot
@endcomponent

