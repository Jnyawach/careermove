<div>
    <form  wire:submit.prevent="saveJob({{$job->id}})">
        <button type="submit" title="save job" class="btn btn-link m-0 p-0">
            <i class="fa-regular fa-heart"></i>
        </button>
    </form>

</div>
