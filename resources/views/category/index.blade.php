@extends('inventory.layout')

@section('content')
 
    <div class="row">
        <div class="pull-left py-3">
            <h1>
               Inventory / Category
            </h1>
            <a href="{{ route('inventory.index') }}" class="btn btn-success my-3" title="Add new parts">Back to Home</a>
             <a href="{{ route('category.create') }}" class="btn btn-success my-3" title="Add new parts">Add New Category</a>
        </div>
    </div>

    <div class="row">

        <table class="table table-bordered table-light">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
                @foreach($category_list as $key => $item)
                    <tr>
                        <td>{{ 1+$key }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ route('category.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>

                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

    </div>


@endsection