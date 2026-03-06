<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplier;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::paginate(10);
        return view('admin.suplier.index', compact('supliers'));
    }

    public function create()
    {
        return view('admin.suplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_suplier' => 'required|unique:supliers|max:10',
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'kota' => 'required|max:50',
            'telepon' => 'required|max:20'
        ]);

        Suplier::create($request->all());

        return redirect()->route('admin.suplier.index')
            ->with('success', 'Suplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $suplier = Suplier::findOrFail($id);
        return view('admin.suplier.edit', compact('suplier'));
    }

    public function update(Request $request, $id)
    {
        $suplier = Suplier::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'kota' => 'required|max:50',
            'telepon' => 'required|max:20'
        ]);

        $suplier->update($request->all());

        return redirect()->route('admin.suplier.index')
            ->with('success', 'Suplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->delete();

        return redirect()->route('admin.suplier.index')
            ->with('success', 'Suplier berhasil dihapus');
    }
}