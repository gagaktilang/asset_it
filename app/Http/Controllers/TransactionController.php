<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('asset','user')
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $assets = Asset::where('status','Tersedia')->get();
        return view('transactions.create', compact('assets'));
    }

    public function store(Request $request)
    {
        Transaction::create([
            'asset_id' => $request->asset_id,
            'user_id' => Auth::id(),
            'tanggal_pinjam' => now(),
            'status' => 'Dipinjam'
        ]);

        Asset::where('id',$request->asset_id)
            ->update(['status'=>'Dipakai']);

        return redirect()->route('transactions.index')
            ->with('success','Asset berhasil dipinjam');
    }

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}