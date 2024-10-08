<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $datatable)
    {
        return $datatable->render('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:200',
        ]);
        $category= new Category();
        $category->name=$request->name;
        $category->slug=\Str::slug($request->name);
        $category->save();
        toastr('Category Created Successfully','success');
        return redirect()->route('admin.category.index');
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
        $category=Category::find($id);
        return view('admin.portfolio-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|max:200'
        ]);

        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->slug=\Str::slug($request->name);
        $category->save();
        toastr('Category Updated Successfully','success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $hasItem=PortfolioItem::where('category_id', $category->id)->count();
        if($hasItem == 0){
            $category->delete();
            return response(['status'=>'success', 'message'=>'Category Deleted Successfully!']);
        }
        return response(['status'=>'error', 'message'=>'This category is associated with portfolio items. Please delete those first.']);
    }
}
