@extends('layouts.app')

@section('content')

<form action="{{route('vehicle.update', $vehicle)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="original_name">Original Name:</label>
        <input type="text" name="original_name" id="" class="form-control" value="{{$vehicle->original_name}}">
    </div>
    <div class="form-gorup">
        <label for="name">Name:</label>
        <input type="text" name="name" id="" class="form-control" value="{{$vehicle->name}}">
    </div>
    <div class="form-group">
        <label for="path">Image:</label>
        <input type="file" name="path" id="path">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
    </div>
</form>

@endsection