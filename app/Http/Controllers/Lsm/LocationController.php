<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LocationController extends Controller
{
        public function index()
    {
        $lokasi = Lokasi::get();
        return view('lsm.location', compact('lokasi'));
    }

    public function create()
    {
        return view('lsm.add_location');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'url_lokasi' => 'required',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'url_lokasi' => $request->url_lokasi,
        ]);

        return redirect()->route('location.index')->with('success', 'Location has been successfully added');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lsm.edit_location', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $request->validate([
            'nama_lokasi' => 'required',
            'url_lokasi' => 'required',
        ]);

        $data = [
            'nama_lokasi' => $request->nama_lokasi,
            'url_lokasi' => $request->url_lokasi,
        ];

        $lokasi->update($data);

        return redirect()->route('location.index')->with('success', 'Location has been successfully updated');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('location.index')->with('success', 'Location has been successfully deleted');
    }
}
