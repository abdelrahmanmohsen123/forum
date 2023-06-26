<article class="card-body ">

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

         <div class="body">
             {{$reply->body}}
         </div>
         <hr>
 </article>
