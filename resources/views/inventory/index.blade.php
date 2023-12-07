@extends('inventory.layout')

@section('content')
 
    <div class="row">
        <div class="pull-left py-3">
            <h1>
                Computer parts - Inventory listing
            </h1>

            <a href="{{ url('/index/create') }}" class="btn btn-success my-3" title="Add new parts">Add new</a>

             <a href="{{ route('category') }}" class="btn btn-primary my-3" title="Add new parts">View Categories</a>
        </div>
    </div>

    <div class="row">

        <table class="table table-bordered table-light">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Computer unit</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


       @foreach ($inventory as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->computer_unit }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->remarks ? $item->remarks : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach

        </table>


    </div>


@endsection