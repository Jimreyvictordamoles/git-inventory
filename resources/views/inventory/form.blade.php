<div class="mb-3">
    <select class="form-select border border-secondary border-1" id="computer_unit" name="computer_unit">
        <option selected disabled>Computer unit</option>
        <option value="Unit1" {{ old('computer_unit') == 'Unit1' ? 'selected' : '' }}>Unit 1</option>
        <option value="Unit2" {{ old('  ') == 'Unit2' ? 'selected' : '' }}>Unit 2</option>
        <option value="Unit3" {{ old('computer_unit') == 'Unit3' ? 'selected' : '' }}>Unit 3</option>
        <option value="Unit4" {{ old('computer_unit') == 'Unit4' ? 'selected' : '' }}>Unit 4</option>
        <option value="Unit5" {{ old('computer_unit') == 'Unit5' ? 'selected' : '' }}>Unit 5</option>
    </select>
</div>

<div class="mb-3">
    <select class="form-select border border-secondary border-1" id="category_id" name="category_id">
        <option selected disabled>Category</option>
        @foreach($category_list as $category)
            @if(isset($inventory))
                @if($category->id == $inventory->category_id)
                    <option value="{{ $category->id }}" selected> 
                        {{ $category->category_name }}
                    </option>
                @else
                    <option value="{{ $category->id }}"> 
                        {{ $category->category_name }}
                    </option>
                @endif
            @else
                <option value="{{ $category->id }}"> 
                    {{ $category->category_name }}
                </option>
            @endif
        @endforeach
    </select>
</div>

<div class="mb-3">
    <input type="number" class="form-control border border-secondary border-1" placeholder="Quantity" name="quantity">
</div>

<div class="mb-3">
    <select class="form-select border border-secondary border1" id="status" name="status">
        <option selected disabled>Status</option>
        <option value="working" {{ old('status') == 'working' ? 'selected' : '' }}>Working</option>
        <option value="damage" {{ old('status') == 'damage' ? 'selected' : '' }}>Damage</option>
    </select>
</div>

<div class="mb-3">
    <textarea name="remarks" id="remarks" cols="30" rows="10" class="form-control border border-secondary border-1" placeholder="Remarks"></textarea>
</div>
