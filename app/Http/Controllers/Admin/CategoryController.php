<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function categoryIndex()
    {
        $category = Category::all();
        return view('admin.category.categoryIndex', compact('category'));
    }

    public function categoryAdd()
    {
        return view('admin.category.categoryAdd');
    }

    public function categoryCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');

    }

    public function categoryEdit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.categoryEdit', compact('category'));
    }

    public function categoryUpdate(Request $request, $category_id)
    {
        $category = Category::find($category_id);

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        if ($request->hasfile('image')) {

            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }

    public function categoryDelete(Request $request)
    {
        $category = Category::find($request->category_delete_id);

        if ($category) {

            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();

            return redirect('admin/category')->with('message', 'Category Deleted with its posts Successfully');
        } else {
            return redirect('admin/category')->with('message', 'No Data Found!!');
        }
    }
}
