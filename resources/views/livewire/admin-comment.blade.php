<div>
    <div class="opinion mt-3 mb-2">

        <div class="comment mt-3">

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
                <button type="button" class="btn btn-view  m-1" wire:click="deleteComment({{$comment->id}})">delete</button>

            </div>

            @endforeach
            @else
           <h6>No comments on this Post</h6>

            @endif


        </div>
    </div>
</div>

