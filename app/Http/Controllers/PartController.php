<?php

namespace App\Http\Controllers;

use App\Image;
use App\Part;
use App\Vehicle;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PartController extends Controller
{
    //

    public function index () {
        $parts = Part::all();
        $vehicles = Vehicle::all();
        $sides = Part::sides;
        return view('admin.parts.index', compact('parts', 'vehicles', 'sides'));
    }

    public function store (Request $request) {
        $input = $request->all();
        
        $part = Part::create($input);

        if($file = $request->file('path')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('part_images', $name);
        }

        $part->image()->create(['path' => $name]);
        return back();
    }

    public function edit (Part $part) {
        $sides = Part::sides;
        $vehicles = Vehicle::all();
        return view('admin.parts.edit', compact('part', 'vehicles' ,'sides'));
    }

    public function update (Request $request, Part $part) {
        $input = $request->all();
        
        $part->update($input);

        if ($file = $request->file('path')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('part_images', $name);
            File::delete(public_path() . $part->image->path);
            $part->image->path = $name;
            $part->image->save();
        }
        return redirect(route('parts.index'));
    }

    public function destroy (Part $part) {
        File::delete(public_path() . $part->image->path);
        $part->delete();
        return back();
    }
}
