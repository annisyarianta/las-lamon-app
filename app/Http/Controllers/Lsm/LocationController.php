<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
        public function index()
    {
        $location = Location::get();
        return view('lsm.location', compact('location'));
    }

    public function create()
    {
        return view('lsm.add_location');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_url' => 'required',
        ]);

        Location::create([
            'name' => $request->name,
            'location_url' => $request->location_url,
        ]);

        return redirect()->route('location.index')->with('success', 'Location has been successfully added');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('lsm.edit_location', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'location_url' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'location_url' => $request->location_url,
        ];

        $location->update($data);

        return redirect()->route('location.index')->with('success', 'Location has been successfully updated');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('location.index')->with('success', 'Location has been successfully deleted');
    }
}
