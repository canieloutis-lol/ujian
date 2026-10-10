<?php

namespace App\Http\Controllers;

use App\Models\Akutansi;
use App\Models\keuangant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkutansiController extends Controller
{
    public function index()
    {
        $akutansis = Akutansi::with('keuangans')->latest()->get();

        return view('akutansi.index', compact('akutansis'));
    }

    public function create()
    {
        return view('akutansi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:Pegawai,Akutansi,Manajer',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
        ]);

        DB::transaction(function () use ($data): void {
            $kategori = Akutansi::firstOrCreate(
                ['nama' => $data['kategori']],
                [
                    'jumlah' => $data['jumlah'],
                    'tanggal' => $data['tanggal'],
                ],
            );

            keuangant::create([
                'nama' => $data['nama'],
                'akuntansi_id' => $kategori->id,
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
        });

        return redirect()->route('akutansi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $akutansi = Akutansi::with('keuangans')->findOrFail($id);

        return view('akutansi.show', compact('akutansi'));
    }

    public function edit(string $id)
    {
        $akutansi = Akutansi::findOrFail($id);

        return view('akutansi.edit', compact('akutansi'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $akutansi = Akutansi::findOrFail($id);
        $akutansi->update($data);

        return redirect()->route('akutansi.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $akutansi = Akutansi::findOrFail($id);
        $akutansi->delete();

        return redirect()->route('akutansi.index')->with('success', 'Kategori berhasil dihapus');
    }
}
