@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="border shadow col-sm-3">
            <div class="row">
                <form action="{{route('vehicle.store')}}" method="post" enctype="multipart/form-data" class="col">
                    @csrf
                    <div class="form-group">
                        <label for="original_name">Original Name:</label>
                        <input type="text" name="original_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="path">Image:</label>
                        <input type="file" name="path" id="path">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Vehicle</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        @if($vehicles->count() > 0)
        <div class="col-sm-9">
            <div class="card shadow">
                <table class="table">
                    <thead class="card-header">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Original Name</th>
                            <th>Street Name</th>
                            <th>Vehicle</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="card-body">
                        @foreach($vehicles as $vehicle)
                        <tr>
                            <td class="align-middle">{{$vehicle->id}}</td>
                            <td><img class="rounded-circle" height="60" src="{{$vehicle->image ? $vehicle->image->path : '' }}" alt=""></td>
                            <td class="align-middle">{{$vehicle->original_name}}</td>
                            <td class="align-middle">{{$vehicle->name}}</td>
                            <td class="align-middle">
                                <form action="{{route('vehicle.destroy', $vehicle->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete Vehicle</button>
                                </form>
                            </td>
                            <td class="align-middle">
                                <form action="{{route('vehicle.edit', $vehicle)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit Vehicle</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>

@endSection