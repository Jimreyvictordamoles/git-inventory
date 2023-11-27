@extends('inventory.layout')

@section('content')
    <div class="row">
        <div class="pull-left py-3">
            <h1>Computer Part Details</h1>
            <a href="{{ route('inventory.index') }}" class="btn btn-primary my-3">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <dl class="row">
                <dt class="col-sm-3">Computer Unit:</dt>
                <dd class="col-sm-9">{{ $inventory->computer_unit }}</dd>

                <dt class="col-sm-3">Category:</dt>
                <dd class="col-sm-9">{{ $inventory->category }}</dd>

                <dt class="col-sm-3">Quantity:</dt>
                <dd class="col-sm-9">{{ $inventory->quantity }}</dd>

                <dt class="col-sm-3">Status:</dt>
                <dd class="col-sm-9">{{ $inventory->status }}</dd>

                <dt class="col-sm-3">Remarks:</dt>
                <dd class="col-sm-9">{{ $inventory->remarks ? $inventory->remarks : 'N/A' }}</dd>
            </dl>
        </div>
    </div>
@endsection