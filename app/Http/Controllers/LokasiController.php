<?php

namespace App\Http\Controllers;
use App\Models\lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        return lokasi::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        return lokasi::create($request->all());
    }
    public function show($id)
    {
        return lokasi::find($id);
    }
    public function update(Request $request, $id)
    {
        $lokasi = lokasi::find($id);
        $request->validate([
            'nama_lokasi' => 'string|max:255',
            'alamat' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
        ]);
        $lokasi->update($request->all());
        return $lokasi;
    }
    public function destroy($id)
    {
        return lokasi::destroy($id);
    }
}
