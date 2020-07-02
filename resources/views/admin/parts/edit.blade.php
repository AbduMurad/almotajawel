@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="row">
                <form action="{{route('part.update', $part->id)}}" method="post" enctype="multipart/form-data" class="col">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="serial_number">SN:</label>
                        <input type="text" name="serial_number" value="{{$part->serial_number}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="original_name">Original Name:</label>
                        <input type="text" name="original_name" value="{{$part->original_name}}" class=" form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{$part->name}}" class=" form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Side</label>
                        <select name="side" value="{{$part->side}}" class=" form-control">
                            @foreach($sides as $side)
                            <option value="{{$side}}">{{$side}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Vehicle</label>
                        <select name="vehicle_id" value="{{$part->vehicle_id}}" class=" form-control">
                            @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Manufacturer</label>
                        <input type="text" name="manufacturer" value="{{$part->manufacturer}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" name="path" id="path" class=" btn btn-primary">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Part</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection