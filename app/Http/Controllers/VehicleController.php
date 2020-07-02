<?php

namespace App\Http\Controllers;

use App\Image;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\React;

class VehicleController extends Controller
{
    //

    public function index () {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    public function store (Request $request) {
        $input = $request->validate([
            'original_name'=>'required',
            'name'=>'required',
        ]);

        $vehicle = Vehicle::create($input); 
        
        if($file = $request->file('path')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('vehicle_images', $name);
        }

        $vehicle->image()->create(['path'=>$name]);        
        return back();
    }

    public function edit (Vehicle $vehicle) {
        return view('admin.vehicle.edit', compact('vehicle'));
    }

    public function update (Request $request, Vehicle $vehicle) {
        $input = $request->all();

        $vehicle->update($input);

        if ($file = $request->file('path')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('vehicle_images', $name);
            $vehicle->image()->create(['path' => $name]); 
        }

        return redirect(route('vehicle.index'));
    }

    public function destroy (Vehicle $vehicle) {
        File::delete(public_path() . $vehicle->image->path);
        $vehicle->delete();
        return back();
    }
}
