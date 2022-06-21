<div>
   <section class="p-5">
    <form wire:submit.prevent='createProduct'>
        <div class="form-group">
            <label class="control-label" for="name">Product Name:</label>
            <input type="text" name="name" id="name" required wire:model="name" class="form-control mt-3">
            @error('name') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-group row mt-3">
            <div class="col-12 col-md-6 col-lg-4">
                <label class="control-label" for="category">Category:</label>
                <select class="form-select mt-3" id="education_level" name="category" required wire:model.lazy="category">
                    <option selected value="">Select Category</option>
                    @foreach ($categories as $identity=>$category )
                    <option value="{{$identity}}">{{$category}}</option>
                    @endforeach



                </select>
                @error('category') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <label class="control-label" for="sale_price">Marked Price(KES):</label>
                <input type="text" name="sale_price" id="sale_price" required wire:model.lazy="sale_price"
                    class="form-control mt-3">
                @error('sale_price') <span class="error">{{ $message }}</span> @enderror

            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <label class="control-label" for="price">Price(KES):</label>
                <input type="text" name="sprice" id="price" required wire:model.lazy="price" class="form-control mt-3">
                @error('price') <span class="error">{{ $message }}</span> @enderror

            </div>

        </div>
        <div class="form-group mt-3">
            <label for="description" class="control-label">Study summary</label>
            <div>
                <small>Briefly describe the product</small>

            </div>

            <textarea class="form-control mt-2" id="description" wire:model.lazy="description" style="height: 200px"
                name="description" required>{{$description}}</textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-group mt-3 row">
            <div class="col-md-6">
                <label for="photo" class="form-label">Product Image:</label>

                <input class="form-control" type="file" id="photo" name="photo" wire:model="photo">
                @error('photo') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Product image Should be 874px by 1240px </small>
            </div>
        </div>
        <hr>
        <div class="form-group mt-3 text-end">
            <a href="{{route('products.index')}}" class="btn btn-view">Cancel</a>
            <button type="submit" class="btn btn-secondary">
                Save
            </button>

        </div>
    </form>
   </section>
</div>
