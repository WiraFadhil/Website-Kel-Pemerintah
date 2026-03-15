<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|url',
            'button_color_class' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        Slider::create($validated + ['image_path' => $path]);


        return redirect()->route('admin.slider')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Slider $slider)
    // {
    //     // Biasanya tidak digunakan untuk admin panel CRUD, bisa dikosongkan.
    //     return redirect()->route('sliders.edit', $slider);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.edit-slider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Nullable on update
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|url',
            'button_color_class' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

       if ($request->hasFile('image')) {
    // Hapus gambar lama dari disk 'public'
        Storage::disk('public')->delete($slider->image_path);

        // Simpan gambar baru ke folder sliders di disk 'public'
        $path = $request->file('image')->store('sliders', 'public');
        $validated['image_path'] = $path; // hasilnya: sliders/namafile.png
    }

        $slider->update($validated);

        return redirect()->route('admin.slider')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // Hapus gambar dari storage
        Storage::delete($slider->image_path);
        // Hapus record dari database
        $slider->delete();

        return redirect()->route('admin.slider')->with('success', 'Slider deleted successfully.');
    }
}