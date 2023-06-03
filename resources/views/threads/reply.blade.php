<article class="card-body">

    <a href="">
     {{$reply->owner->name}}

    </a>

    said {{$reply->created_at->diffForHumans()}} ...

         <div class="body">
             {{$reply->body}}
         </div>
         <hr>
 </article>
