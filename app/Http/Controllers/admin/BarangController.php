<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Suplier;

class BarangController extends Controller
{
     public function index(Request $request)
    {
        $query = Barang::with('suplierRelasi');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('id_barang', 'LIKE', "%{$search}%")
                  ->orWhere('nama_barang', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        $barangs = $query->paginate(10);
        
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        $supliers = Suplier::all();
        $kategoris = ['Makanan', 'Kosmetik', 'Aksesoris'];
        return view('admin.barang.create', compact('supliers', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|unique:barangs|max:10',
            'kategori' => 'required|in:Makanan,Kosmetik,Aksesoris',
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'suplier' => 'required|exists:supliers,id_suplier'
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $supliers = Suplier::all();
        $kategoris = ['Makanan', 'Kosmetik', 'Aksesoris'];
        return view('admin.barang.edit', compact('barang', 'supliers', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:Makanan,Kosmetik,Aksesoris',
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'suplier' => 'required|exists:supliers,id_suplier'
        ]);

        $barang->update($request->all());

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}