@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="border shadow col-sm-3">
            <div class="row">
                <form action="{{route('part.store')}}" method="post" enctype="multipart/form-data" class="col">
                    @csrf
                    <div class="form-group">
                        <label for="serial_number">SN:</label>
                        <input type="text" name="serial_number" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="original_name">Original Name:</label>
                        <input type="text" name="original_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Side</label>
                        <select name="side" id="" class="form-control">
                            @foreach($sides as $side)
                            <option value="{{$side}}">{{$side}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Vehicle</label>
                        <select name="vehicle_id" id="" class="form-control">
                            @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Manufacturer</label>
                        <input type="text" name="manufacturer" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="path">Image</label>
                        <input type="file" name="path" id="" class="btn btn-primary">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Part</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        @if($parts->count() > 0)
        <div class="col-sm-9">
            <div class="card shadow">
                <table class="table">
                    <thead class="card-header">
                        <tr>
                            <th>SN</th>
                            <th>Original Name</th>
                            <th>Name</th>
                            <th>Side</th>
                            <th>Vehicle</th>
                            <th>Manufacturer</th>
                            <th>Image</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="card-body">
                        @foreach($parts as $part)
                        <tr>
                            <td class="align-middle">{{$part->serial_number}}</td>
                            <td class="align-middle">{{$part->original_name}}</td>
                            <td class="align-middle">{{$part->name}}</td>
                            <td class="align-middle">{{$part->side}}</td>
                            <td class="align-middle">{{$part->vehicle_id}}</td>
                            <td class="align-middle">{{$part->manufacturer}}</td>
                            <td class="align-middle"><img height="50" src="{{$part->image ? $part->image->path : '' }}" alt=""></td>
                            <td class="align-middle">
                                <a href="{{route('part.edit', $part)}}">Edit</a>
                            </td>
                            <td class="align-middle">
                                <form action="{{route('part.destroy', $part)}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
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