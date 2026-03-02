<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Asset::query();

    // Search
    if ($request->search) {
        $query->where('nama_asset', 'like', '%' . $request->search . '%')
              ->orWhere('kode_asset', 'like', '%' . $request->search . '%');
    }

    // Filter Status
    if ($request->status) {
        $query->where('status', $request->status);
    }

    $assets = $query->latest()->paginate(10)->withQueryString();

    $total = Asset::count();
    $tersedia = Asset::where('status', 'Tersedia')->count();
    $dipakai = Asset::where('status', 'Dipakai')->count();
    $rusak = Asset::where('status', 'Rusak')->count();

    return view('assets.index', compact(
        'assets',
        'total',
        'tersedia',
        'dipakai',
        'rusak'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_asset' => 'required',
        'kode_asset' => 'required|unique:assets,kode_asset',
        'kategori' => 'required',
        'lokasi' => 'required',
        'status' => 'required'
    ]);

    $asset = Asset::create($validated);

    return response()->json([
        'success' => true,
        'asset' => $asset
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
    return redirect()->route('assets.index')->with('success','Deleted');
    }
}
