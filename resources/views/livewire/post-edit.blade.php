<div>
    <div class="imgCard">
        <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}">

    </div>
    <form wire:submit.prevent="updatePost">
        <div class="form-group row mt-3">
            <div class="col-12 col-md-6">
                <label for="author" class="control-label">Select Author:</label>
                <select class="form-select" name="select" wire:model="author" required>
                    <option selected value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
                    @endforeach
                </select>
                @error('author') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Select the author of the post</small>
            </div>

        </div>
        <div class="form-group mt-3">

            <label for="title" class="control-label">
                Post Title:
            </label>
            <input type="text" name="title" wire:model="title" id="title" required
                   class="form-control mt-2">
            @error('title') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Should not exceed 80 Characters.</small>
            <small>Should contain at least one Keyword For Example:
                Antiviral drug combo may be effective against <strong>COVID-19</strong></small>
        </div>

        <div class="form-group mt-3">
            <label for="summary" class="control-label">Summary:</label>
            <textarea wire:model="summary" name="summary" id="summary" class="form-control mt-2" rows="4"></textarea>
            @error('summary') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Should not exceed 500 Characters. Should be descriptive and contain Keyword</small>
        </div>

        <div class="form-group mt-3">
            <label for="summary" class="control-label">Tags:</label>
            <textarea wire:model="tags" name="tags" id="tags" class="form-control mt-2" rows="4"></textarea>
            @error('tags') <span class="error">{{ $message }}</span> @enderror<br>
            <small>A maximum of 15 tags separated by comma. Should contain Keyword</small>
        </div>

        <div  class="form-group mt-3">

            <div wire:ignore class="form-group mt-3 ">
                <label for="content" class="control-label">Content:</label>
                <div
                    class="form-textarea w-full"
                    x-data
                    x-init="
                     ClassicEditor.create($refs.myIdentifierHere)
                    .then( function(editor){
                        editor.model.document.on('change:data', () => {
                           $dispatch('input', editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );
                "
                    wire:ignore
                    wire:key="myIdentifierHere"
                    x-ref="myIdentifierHere"
                    wire:model.debounce.9999999ms="content"
                >{!! $content !!}</div>
                @error('content') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should contain at least one Keyword in the first 150 words</small>
            </div>

        </div>
        <div class="form-group mt-3 row">
            <div class="col-md-6">
                <label for="imageCard" class="form-label">Post Image:</label>

                <input class="form-control" type="file" id="imageCard" name="image_card" wire:model="image_card">
                @error('image_card') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should be a banner image Size 960px by 540px </small>
            </div>
        </div>


        <div class="form-group mt-3">
            <label for="title" class="control-label">
                Image Credit:
            </label>
            <input type="text" name="image_credit" wire:model="image_credit" id="imageCredit" required
                   class="form-control mt-2">
            @error('image_credit') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Should not exceed 50 Characters </small>
            <small>For Example: Elpidio Costa Junior/Getty Images</small>
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Publish for Post</button>
        </div>
    </form>
    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
</div>
