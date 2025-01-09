<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', ['barangs' => $barangs]);
    }

    public function getBarang(Request $request)
    {
        if ($request->ajax()) {
            $data = Barang::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.barang.create');
    }

    public function handleCreate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/menu', 'public');
            $imageUrl = "/storage/{$path}";
            $validated['image_url'] = $imageUrl;
        }

        $barang = Barang::create($validated);
        return redirect('/admin/barang')->with('success', 'Data berhasil dibuat');
    }

    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', ['barang' => $barang]);
    }

    public function handleEdit(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/menu', 'public');
            $imageUrl = "/storage/{$path}";
            $validated['image_url'] = $imageUrl;
        }

        $barang->update($validated);
        return redirect('/admin/barang')->with('success', 'Data berhasil diupdate');
    }

    public function delete(Barang $barang)
    {
        $barang->delete();
        return redirect('/admin/barang')->with('success', 'Data berhasil dihapus');
    }
}
