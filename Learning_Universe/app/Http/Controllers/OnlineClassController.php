<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use App\Models\OnlineClass;
use App\Models\Category;

class OnlineClassController extends Controller
{
    public function index()
    {
        $onlineClasses = OnlineClass::take(4)->get();
        return view('dashboard', compact('onlineClasses'));
    }

    public function table()
    {
        $onlineClasses = OnlineClass::all();
        return view('admin_kelas.index', compact('onlineClasses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin_kelas.create', ['categories'=> $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'class_title' => 'required',
            'class_description'=> 'required',
            'class_price' => 'required',
            'class_picture' => 'required|image|mimes:jpeg,png,jpg',
        ],[
            'category_id.required'=> 'category field must be filled',
            'class_title.required'=> 'title field must be filled',
            'class_description.required'=> 'description field must be filled',
            'class_price.required'=> 'price field must be filled',
        ]);

        $category = Category::find($request->category_id);

        $onlineClasses = new OnlineClass;
        $onlineClasses->class_title = $request->input('class_title');
        $onlineClasses->class_description = $request->input('class_description');
        $onlineClasses->class_price = $request->input('class_price');

        $onlineClasses->category()->associate($category);

        if ($request->hasFile('class_picture'))
        {
            $file = $request->file('class_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/onlineClasses/', $filename);
            $onlineClasses->class_picture = $filename;
        }

        $onlineClasses->save();
        return redirect()->route('class')->with('status', 'Class Image Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $onlineClasses = OnlineClass::find($id);
         return view('admin_kelas.edit', compact('onlineClasses'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'class_title'=> 'required',
            'class_description'=> 'required',
            'class_price'=> 'required',
            'class_picture'=> 'image|mimes:jpeg,png,jpg',
        ],[
            'category_id.required'=> 'category field must be filled',
            'class_title.required'=> 'title field must be filled',
            'class_description.required'=> 'description field must be filled',
            'class_price.required'=> 'price field must be filled',
        ]);

        $category = Category::find($request->category_id);

        $onlineClasses = OnlineClass::find($id);
        $onlineClasses->class_title = $request->input('class_title');
        $onlineClasses->class_description = $request->input('class_description');
        $onlineClasses->class_price = $request->input('class_price');

        $onlineClasses->category()->associate($category);

        if($request->hasFile('class_picture'))
        {
            $destination = 'uploads/onlineClasses/'.$onlineClasses->class_picture;
            if(Storage::exists($destination))
            {
                Storage::delete($destination);
            }
            $file = $request->file('class_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/onlineClasses/', $filename);
            $onlineClasses->class_picture = $filename;
        }
        $onlineClasses->update();
        return redirect()->route('class')->with('statuse', 'onlineClasses image updated successfully');

    }

    public function destroy(string $id)
    {
        $onlineClasses = OnlineClass::find($id);
        $destination = 'uploads/onlineClasses'.$onlineClasses->class_picture;
        if(Storage::exists($destination))
        {
            Storage::delete($destination);
        }
        $onlineClasses->delete();
        return redirect()->route('class')->with('statusd','OnlineClasses image deleted successfully');
    }
}
