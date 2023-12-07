@extends('inventory.layout')

@section('content')
    <div class="row">
        <div class="pull-left py-3">
            <h1>Category Details</h1>
            <a href="{{ route('category') }}" class="btn btn-primary my-3">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <dl class="row">
                <dt class="col-sm-3">Category Name:</dt>
                <dd class="col-sm-9">{{ $category->category_name }}</dd>
                <dt class="col-sm-3">Status:</dt>
                <dd class="col-sm-9">{{ $category->status }}</dd>
            </dl>
        </div>
    </div>
@endsection