<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\OnlineClass;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($class_id)
    {
        $materials = Material::where('online_class_id', $class_id)->get();
        $onlineClass = OnlineClass::where('id', $class_id)->first();
        // Pastikan kelas ditemukan
        if (!$onlineClass) {
            return redirect()->route('class')->with('error', 'Class not found.');
        }
        return view('admin_materials.index', compact('materials', 'onlineClass'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($class_id)
    {
        $onlineClass = OnlineClass::find($class_id);

        // Pastikan kelas ditemukan
        if (!$onlineClass) {
            return redirect()->route('class')->with('error', 'Class not found.');
        }

        return view('admin_materials.create', ['onlineClass' => $onlineClass]);
    }

    public function store(Request $request)
    {
    // Validasi input materi
    $request->validate([
        'material_title' => 'required',
        'material_description' => 'required',
        'class_id' => 'required|exists:online_classes,id',
    ], [
        'material_title.required' => 'Title field must be filled',
        'material_description.required' => 'Description field must be filled',
        'class_id.required' => 'Class ID field must be filled',
        'class_id.exists' => 'Selected class does not exist',
    ]);

    // Buat materi baru
    $material = new Material;
    $material->material_title = $request->input('material_title');
    $material->material_description = $request->input('material_description');

    // Hubungkan materi dengan kelas
    $material->online_class_id = $request->input('class_id');

    $material->save();

    // Retrieve the OnlineClass for the view
    $onlineClass = OnlineClass::find($request->input('class_id'));

    return redirect()->route('materials.index', ['class_id' => $onlineClass->id])->with('success', 'Material added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materials = Material::find($id);

        if(!$materials) {
            return redirect()->route('materials.index')->with('error', 'Material not found');
        }

        $onlineClass = OnlineClass::find($materials->online_class_id);

        return view('admin_materials.edit', compact('materials', 'onlineClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'material_title' => 'required',
            'material_description' => 'required',
        ],[
            'material_title.required' => 'Title field must be filled',
            'material_description.required' => 'Description field must be filled',
        ]);

        $material = Material::find($id);

        if (!$material) {
            return redirect()->route('materials.index')->with('error', 'Material not found.');
        }

        $material->material_title = $request->input('material_title');
        $material->material_description = $request->input('material_description');
        $material->save();

        $classId = $material->online_class_id;

        return redirect()->route('materials.index', ['class_id' => $classId])->with('successe', 'Material edited successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::find($id);

        if (!$material) {
            return redirect()->route('materials.index')->with('errord','Material not found');
        }

        $classId = $material->online_class_id;

        $material->delete();

        return redirect()->route('materials.index', ['class_id' => $classId])->with('successd', 'Material deleted successfully');
    }
}
