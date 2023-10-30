<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('backend.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_name'      => 'required',
        ]);

        Category::create([
            'category_name'          => $request->category_name,
            'created_at'             => Carbon::now(),
        ]);

        $notification = array(
            'message'           => 'Category Added',
            'alert-type'        => 'success',
        );

        return back()->with($notification);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('backend.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_name'      => 'required',
        ]);

        Category::find($request->id)->update([
            'category_name'          => $request->category_name,
            'created_at'             => Carbon::now(),
        ]);

        $notification = array(
            'message'           => 'Category Updated',
            'alert-type'        => 'success',
        );

        return back()->with($notification);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        $notification = array(
            'message'           => 'Category Deleted',
            'alert-type'        => 'success',
        );

        return back()->with($notification);
    }
}
