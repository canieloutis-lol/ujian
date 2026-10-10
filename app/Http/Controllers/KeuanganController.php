<?php

namespace App\Http\Controllers;

use App\Models\Akutansi;
use App\Models\keuangant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangans = keuangant::with('akuntansi')->latest()->get();

        return view('keuangan.keuangan', compact('keuangans'));
    }

    public function create()
    {
        $akutansis = Akutansi::all();

        return view('keuangan.create', compact('akutansis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = $r->validate([
            'nama' => 'required',
            'akuntansi_id' => 'required|exists:akutansis,id',
            'jumlah' => 'nullable|numeric',
            'tanggal' => 'nullable|date',
        ]);

        $keuangan = keuangant::create($data);

        return redirect()->route('keuangan.keuangan')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $keuangan = keuangant::with('akuntansi')->findOrFail($id);

        return view('keuangan.show', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keuangan = keuangant::with('akuntansi')->findOrFail($id);
        $akutansis = Akutansi::all();

        return view('keuangan.edit', compact('keuangan', 'akutansis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $data = $r->validate([
            'nama' => 'required',
            'akuntansi_id' => 'required|exists:akutansis,id',
            'jumlah' => 'nullable|numeric',
            'tanggal' => 'nullable|date',
        ]);

        $keuangan = keuangant::findOrFail($id);
        $keuangan->update($data);

        return redirect()->route('keuangan.keuangan')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keuangan = keuangant::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
