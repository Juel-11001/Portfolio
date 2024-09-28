<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:200',
            'client'=>'max:200',
            'website_url'=>'url|max:200',
            'category_id'=>'required|numeric',
            'description'=>'required|max:10000',
            'image'=>'required|image|max:5120',
        ]);

        $imagePath=handleUpload('image');
        $portfolioItem= new PortfolioItem();

        $portfolioItem->title=$request->title;
        $portfolioItem->client=$request->client;
        $portfolioItem->website_url=$request->website_url;
        $portfolioItem->category_id=$request->category_id;
        $portfolioItem->description=$request->description;
        $portfolioItem->image=$imagePath;
        $portfolioItem->save();

        toastr('Portfolio Item Created Successfully','success');
        return redirect()->route('admin.portfolio-item.index');
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
        $portfolioItem=PortfolioItem::find($id);
        $categories=Category::all();
        return view('admin.portfolio-item.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'client'=>'max:200',
            'website_url'=>'url|max:200',
            'category_id'=>'required|numeric',
            'description'=>'required|max:10000',
            'image'=>'image|max:5120',
        ]);

        $portfolioItem=PortfolioItem::find($id);

        $imagePath=handleUpload('image', $portfolioItem);

        $portfolioItem->title=$request->title;
        $portfolioItem->client=$request->client;
        $portfolioItem->website_url=$request->website_url;
        $portfolioItem->category_id=$request->category_id;
        $portfolioItem->description=$request->description;
        $portfolioItem->image=(!empty($imagePath) ? $imagePath : $portfolioItem->image);
        $portfolioItem->save();
        toastr('Portfolio Item Updated Successfully','success');
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem=PortfolioItem::findOrFail($id);
        deleteFileIfExists($portfolioItem->image);
        $portfolioItem->delete();
        return response(['status'=>'success', 'message'=>'Portfolio Item Deleted Successfully']);

    }
}
