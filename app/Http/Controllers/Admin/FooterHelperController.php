<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelperDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelper;
use Illuminate\Http\Request;

class FooterHelperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelperDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.footer-help.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-help.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:200',
            'url'=>'required'
        ]);
        $help=new FooterHelper();
        $help->name=$request->name;
        $help->url=$request->url;
        $help->save();
        toastr('Help Link Created Successfully!', 'success');
        return redirect()->route('admin.help-link.index');
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
        $help=FooterHelper::find($id);
        return view('admin.footer.footer-help.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|max:200',
            'url'=>'required'
        ]);
        $help=FooterHelper::find($id);
        $help->name=$request->name;
        $help->url=$request->url;
        $help->save();
        toastr('Help Link Updated Successfully!', 'success');
        return redirect()->route('admin.help-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $help=FooterHelper::find($id);
        $help->delete();
        return response(['status'=>'success', 'message'=>'Help Link Deleted Successfully!']);
    }
}
