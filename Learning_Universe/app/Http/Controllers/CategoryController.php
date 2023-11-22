<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('admin_category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('category_name', $request->category_name);

        $request->validate([
            'category_name' =>  'required',
        ],[
            'category_name.required'=>'this field must be filled!',
        ]);
        $categories = [
            'category_name'=> $request->category_name,
        ];
        Category::create($categories);
        return redirect()->to('category')->with('success','Make sure the data was inputed correctly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $classesInCategory = $category->onlineClasses ?? collect([]);
        $firstOnlineClass = $classesInCategory->first();
        return view('category.show', compact('category', 'classesInCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('id', $id)->first();
        return view('admin_category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name'=> 'required',
        ],[
            'category_name.required'=>'this field must be filled!',
        ]);
        $categories = [
            'category_name'=>$request->category_name,
        ];

        Category::where('id', $id)->update($categories);
        return redirect()->to('category')->with('successe','Make sure the data edited correctly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect()->to('category')->with('successd','Be aware of the deleted data');
    }
}
