@extends('inventory.layout')

@section('content')
    <div class="row">
        <div class="pull-left py-3">
            <h1>
               Inventory / Category / Edit
            </h1>
            <a href="{{ route('category') }}" class="btn btn-primary my-3" title="Add new parts">Back to Category</a>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf

        	@method('PUT')

            @include('category/form')

            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>

        </form>
    </div>
@endsection