<reply inline-template>
    <article class="card-body " id="reply-{{ $reply->id }}">

        {{-- <div class="level "> --}}
            <h5 class="">
                <a href="" class="flex" style="display: flex">
                    <div class="col-5">
                        <a href="{{route('profiles.show',$reply->owner)}}">
                            {{$reply->owner->name}}
                        </a>

                    </div>

                    <div class="col-1">
                        <form action="{{route('favorites.store',$reply->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary" {{$reply->isFavourited() ? 'disabled':''}}>{{$reply->favorites_count}} Favourite</button>
                        </form>
                   </div>
                   </a>

            </h5>

        {{-- </div> --}}


        said {{$reply->created_at->diffForHumans()}} ...

            <div class="row">
                <div class="body col-9" v-if='editing'>
                    {{-- {{$reply->body}} --}}
                    <textarea name="" id="" cols="10" rows="3"></textarea>
                </div>
                <div class="body col-9" v-else>
                    <div v-if='editing'>
                        <textarea name="" id="" cols="15" rows="3"></textarea>
                    </div>
                    <div v-else>
                        {{$reply->body}}

                    </div>
                </div>

                @can('update', $reply)
                <div class="col-3 row">
                    <div class="col-3">
                        <button class="btn btn-sm btn-primary" @click="editing = true">Edit</button>

                    </div>
                    <div class="col-3">
                        <form action="{{ route('replies.destroy',$reply->id)}}" method="GET">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>

                 </div>
                @endcan

            </div>

             <hr>

     </article>

</reply>


