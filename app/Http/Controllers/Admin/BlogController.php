<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'category_id' => 'required|numeric',
            'description' => 'required|max:10000',
            'image' => 'required|image|max:5120',
        ]);

        $imagePath=handleUpload('image');

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->image = (!empty($imagePath) ? $imagePath : $blog->image);
        $blog->save();
        toastr('Blog Created Successfully', 'success');
        return redirect()->route('admin.blog.index');
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
        $categories=BlogCategory::all();
        $blog=Blog::findOrFail($id);
        return view('admin.blog.edit', compact('categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'category_id' => 'required|numeric',
            'description' => 'required|max:10000',
            'image' => 'image|max:5120',
        ]);

        $blog = Blog::findOrFail($id);
        $imagePath=handleUpload('image', $blog);

        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->image = (!empty($imagePath) ? $imagePath : $blog->image);
        $blog->save();
        toastr('Blog Updated Successfully', 'success');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response(['status' => 'success', 'message'=>'Blog Deleted Successfully']);
    }
}
