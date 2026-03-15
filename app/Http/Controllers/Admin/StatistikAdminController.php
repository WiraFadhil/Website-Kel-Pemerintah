<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatistikAdminController extends Controller
{
    /**
     * Menampilkan daftar semua data statistik.
     */
    public function index()
    {
        $statistics = Statistic::orderBy('group')->get();
        return view('admin.data-statistik', compact('statistics'));
    }

    /**
     * Menampilkan formulir untuk membuat data baru.
     */
    public function create()
    {
        return view('admin.tambah-data-statistik');
    }

    /**
     * Menyimpan data baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:statistics,key',
            'group' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:255',
        ]);

        Statistic::create($request->all());

        return redirect()->route('admin.data-statistik')
                         ->with('success', 'Data statistik baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit data.
     */
    public function edit(Statistic $statistic)
    {
        return view('admin.edit-data-statistik', compact('statistic'));
    }

    /**
     * Memperbarui data yang ada di database.
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:statistics,key,' . $statistic->id,
            'group' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:255',
        ]);

        $statistic->update($request->all());

        return redirect()->route('admin.data-statistik')
                         ->with('success', 'Data statistik berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('admin.data-statistik')
                         ->with('success', 'Data statistik berhasil dihapus.');
    }
}
