@extends ('inventory.layout')

@section('content')


    <div class="row">
        <div class="pull-left py-3">
            <h3>
                Edit parts
            </h3>
            
            <a href="{{ route('inventory.index') }}" class="btn btn-primary my-3">Back</a>
        </div>
    </div>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('inventory.update', $inventory->id) }}">
        @csrf
        @method('PUT')

        <div class="row">

           @include('inventory/form')
           
            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Update Inventory Item</button>
            </div>
        
        </div>

    </form>


@endsection