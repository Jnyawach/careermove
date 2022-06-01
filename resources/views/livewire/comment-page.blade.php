<div>
    <div class="opinion mt-3 mb-2">
        <h5 class="fw-bold  m-1">What do you think about this article?</h5>
        <button type="button" class="btn btn-secondary  m-1" wire:click="updateLike"> <i class="fa-solid fa-thumbs-up"></i> {{$like}}</button>
        <button type="button" class="btn btn-view  m-1" wire:click="updateDislike"> <i class="fa-solid fa-thumbs-down"></i> {{$dislike}}</button>
        <div class="comment mt-3">
            @auth
            <h6>Add Comment</h6>
            <form wire:submit.prevent="saveComment">
            <textarea name="comment" placeholder="Type Comment" class="form-control" wire:model.defer="comment"></textarea>
            @error('comment') <span class="error">{{ $message }}</span> @enderror<br>
            <div class="form-group mt-2">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
            </form>
            @endauth

            @guest ()
            <a href="{{route('login')}}">Please login to comment</a>
            @endguest

            <hr>
            <div class="">
                <div wire:loading.delay>
                    <div class="spinner-grow spinner-grow-sm spin" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm spin " role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm spin" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>


            </div>
            @if ($comments->count()>0)
            @foreach ($comments as $comment )
            <div class="comment-detail">
                <h6 class="fw-bold">{{$comment->user->name}} . <span>{{$comment->created_at->diffForHumans()}}</span></h6>
                <p>{{$comment->comment}}</p>

            </div>

            @endforeach
            @else
            <a href="{{route('login')}}" class="mb-5">Be the first to comment on this article</a>

            @endif


        </div>
    </div>
</div>
