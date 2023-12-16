<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMaterial;
use App\Models\OnlineClass;
use App\Models\Material;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class DetailMaterialController extends Controller
{
    public function index($class_id, $material_id)
    {
        $onlineClass = OnlineClass::find($class_id);

        if (!$onlineClass) {
            return redirect()->route('materials.index', ['class_id' => $class_id])->with('error', 'Class not found.');
        }

        $material = Material::find($material_id);

        if (!$material) {
            return redirect()->route('materials.index', ['class_id' => $class_id])->with('error', 'Material not found.');
        }

        $details = DetailMaterial::where('material_id', $material_id)->get();
        return view('admin_details.index', compact('details', 'onlineClass', 'material_id'));
    }

    public function create($class_id, $material_id)
    {
        $onlineClass = OnlineClass::find($class_id);

        if (!$onlineClass) {
            return redirect()->route('class')->with('error', 'Class not found.');
        }

        $material = Material::find($material_id);

        if (!$material) {
            return redirect()->route('materials.index', ['class_id' => $class_id])->with('error', 'Material not found.');
        }

        return view('admin_details.create', compact('onlineClass', 'class_id', 'material_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'detail_title' => 'required',
            'detail_subtitle' => 'required',
            'detail_text' => 'required',
            'detail_image' =>'required|image|mimes:jpeg,png,jpg',
        ], [
            'detail_title.required' => 'Detail Title is required',
            'detail_subtitle.required' => 'Detail Subtitle is required',
            'detail_text.required' => 'Detail Text is required',
            'detail_image.required' => 'Detail Image is required',
        ]);

        $detail = new DetailMaterial;
        $detail->detail_title = $request->input('detail_title');
        $detail->detail_subtitle = $request->input('detail_subtitle');
        $detail->detail_text = $request->input('detail_text');
        $detail->material_id = $request->input('material_id');

        if ($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $file->move('uploads/detailMaterials/', $filename);
            $detail->detail_image = $filename;
        }

        $detail->save();

        return redirect()->route('detail-material.index', ['class_id' => $request->input('class_id'), 'material_id' => $request->input('material_id')])
            ->with('success', 'Detail Material Added Successfully');
    }

    public function show($classId)
    {
        $class = OnlineClass::findOrFail($classId);
        $category = Category::findOrFail($class->category_id);
        $materials = Material::where('online_class_id', $classId)->get();

        $averageRating = $class->ratings->avg('rating_value');

        return view('myclass.show', compact('class', 'category', 'materials', 'averageRating'));
    }

    public function showDetail($classId, $materialId, $detailId)
    {
        $class = OnlineClass::findOrFail($classId);
        $category = Category::findOrFail($class->category_id);
        $material = Material::findOrFail($materialId);
        $detailMaterial = DetailMaterial::findOrFail($detailId);

        $relatedMaterials = $class->materials;
        $relatedDetails = $material->detailMaterials;

        $allMaterialsOpened = $class->materials->every(function ($material) {
            return $material->detailMaterials->isNotEmpty();
        });

        if (!$allMaterialsOpened) {
            return redirect()->route('myclass.show', ['classId' => $classId]);
        }

        $nextMaterial = null;
        if (!$allMaterialsOpened && $class->materials->count() > 0) {
            $nextMaterial = $class->materials->first();
        }


        // Find the index of the current material
        $currentIndex = $relatedMaterials->search(function ($item) use ($materialId) {
            return $item->id == $materialId;
        });

        $nextSlideId = $currentIndex !== false ? $currentIndex + 1 : 0;

        return view('myclass.detail', compact(
            'class', 'category', 'material', 'detailMaterial', 'relatedMaterials', 'relatedDetails', 'allMaterialsOpened', 'nextSlideId', 'nextMaterial'
                ))->with('nextMaterial', $relatedMaterials[$nextSlideId] ?? null);
    }

    public function edit($class_id, $material_id, $id)
    {
        $detail = DetailMaterial::find($id);
        $onlineClass = OnlineClass::find($class_id);

        if (!$detail) {
            return redirect()->route('detail-material.index', ['class_id' => $class_id, 'material_id' => $material_id])
                ->with('error', 'Detail Material not found');
        }

        return view('admin_details.edit', compact('detail', 'onlineClass', 'material_id'));
    }

    public function update(Request $request, $class_id, $material_id, $id)
    {
        $request->validate([
            'detail_title' =>'required',
            'detail_subtitle' =>'required',
            'detail_text' =>'required',
            'detail_image' =>'image|mimes:jpeg,png,jpg',
        ], [
            'detail_title.required' => 'Detail Title is required',
            'detail_subtitle.required' => 'Detail Subtitle is required',
            'detail_text.required' => 'Detail Text is required',
        ]);

        $detail = DetailMaterial::find($id);

        $detail->detail_title = $request->input('detail_title');
        $detail->detail_subtitle = $request->input('detail_subtitle');
        $detail->detail_text = $request->input('detail_text');

        if ($request->hasFile('detail_image')) {
            $destination = 'uploads/detailMaterials/' . $detail->detail_image;
            if (Storage::exists($destination)) {
                Storage::delete($destination);
            }
            $file = $request->file('detail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . $extension;
            $file->move('uploads/detailMaterials/', $filename);
            $detail->detail_image = $filename;
        }

        $detail->update();

        return redirect()->route('detail-material.index', ['class_id' => $class_id, 'material_id' => $material_id])
            ->with('successe', 'Detail Material Edited Successfully');
    }

    public function destroy($class_id, $material_id, $id)
    {
        $detail = DetailMaterial::find($id);

        if (!$detail) {
            return redirect()->route('detail-material.index', ['class_id' => $class_id, 'material_id' => $material_id])
                ->with('errord', 'Detail Material not found');
        }

        $destination = 'uploads/detailMaterials/' . $detail->detail_image;

        if (Storage::exists($destination)) {
            Storage::delete($destination);
        }

        $detail->delete();

        return redirect()->route('detail-material.index', ['class_id' => $class_id, 'material_id' => $material_id])
            ->with('successd', 'Detail Material Deleted Successfully');
    }
}
