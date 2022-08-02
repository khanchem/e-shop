<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ViewCategory()
    {
        $categories = Category::get();
        return view('admin.category.manage_category', compact('categories'));
    }

    public function StoreCategory(Request $request)
    {
        $data = new Category();

        $data->category_name = $request->category_name;
        $data->category_icon = $request->category_icon;

        $data->save();
        $noty = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $noty = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
}
