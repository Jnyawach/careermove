<div>
    <div class="">
        <div class="filter-bar">
         <h2>Filter Jobs >></h2>

         <div class="filter-form">
             <select class="form-select mt-4 filter-input" wire:model="order">
                 <option selected value="">Recommended</option>
                 <option value="ASC">Closing Soon</option>
                 <option value="DESC">Latest</option>

             </select>

             <select class="form-select mt-4 filter-input" wire:model="location">
                 <option selected value="">Sort by Location</option>
                 @foreach($locations as $location)
                 <option value="{{$location->id}}">{{$location->name}}</option>
                 @endforeach
             </select>

             <select class="form-select mt-4 filter-input" wire:model="publish">
                 <option selected  value="" >Published</option>
                 <option value="7">Last 1 Week</option>
                 <option value="30">Last 30 days</option>
                 <option value="1">Today</option>
             </select>



             <select class="form-select mt-4 filter-input" wire:model="experience">
                 <option selected  value="">Seniority</option>
                 @foreach($experiences as $experience)
                 <option value="{{$experience->id}}">{{$experience->name}}</option>
                 @endforeach

             </select>

             <select class="form-select mt-4 filter-input" wire:model="profession">
                 <option selected  value="">Profession</option>
                 @foreach($professions as $profession)
                 <option value="{{$profession->id}}">{{$profession->name}}</option>
                 @endforeach
             </select>

             <select class="form-select mt-4 filter-input" wire:model="industry">
                 <option selected  value="">Industry</option>
                 @foreach($industries as $industry)
                 <option value="{{$industry->id}}">{{$industry->name}}</option>
                 @endforeach
             </select>


             <div class="reset-form text-center mt-4 mb-3">
                 @if($visible)
                 <button type="button" class="btn btn-view" wire:click="clearFilter">
                     <i class="fa-solid fa-square-xmark me-3"></i>Clear filter
                 </button>
                 @endif
             </div>



         </div>

        </div>
     </div>
</div>
