<div class="mb-3">
    <input type="text" class="form-control border border-secondary border-1" placeholder="Category Name" name="category_name" value="{{ isset($category) ? $category->category_name : ' '}}">
</div>
<div class="mb-3">
    <select class="form-select border border-secondary border1" id="status" name="status">
        <option selected disabled>Status</option>
        <option value="active" 
            {{ isset($category) ?
            $category->status == 'active' ? 'selected' : '' : ''  }}
        > 
            Active
        </option>
        <option value="in-active"
         {{ isset($category) ?
            $category->status == 'in-active' ? 'selected' : '' : ''  }} 
        >
            In active
        </option>
    </select>
</div>
