<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();
        toastr('Category Created Successfully', 'success');
        return redirect()->route('admin.blog-category.index');
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
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.blog-category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);
        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();
        toastr('Category Updated Successfully', 'success');
        return redirect()->route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $hasBlog = Blog::where('category_id', $category->id)->count();
        if ($hasBlog == 0) {
            $category->delete();
            return response(['status' => 'success', 'message' => 'Blog Category Deleted Successfully']);
        }
        return response(['status' => 'error', 'message'=>'This category is associated with blog. Please delete those first.']);
    }
}
