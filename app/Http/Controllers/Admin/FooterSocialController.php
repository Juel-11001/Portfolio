<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.footer-social.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'icon' => 'required',
            'name'=>'required|max:200',
            'url'=>'required|url|max:500'
        ]);
        $social=new FooterSocial();
        $social->icon=$request->icon;
        $social->name=$request->name;
        $social->url=$request->url;
        $social->save();
        toastr('Social Link Created Successfully','success');
        return redirect()->route('admin.footer-social.index');

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
        $social=FooterSocial::find($id);
        return view('admin.footer.footer-social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'icon'=>'required',
           'name'=>'required|max:200',
           'url'=>'required|url|max:500'
        ]);
        $social=FooterSocial::find($id);
        $social->icon=$request->icon;
        $social->name=$request->name;
        $social->url=$request->url;
        $social->save();
        toastr('Social Link Updated Successfully','success');
        return redirect()->route('admin.footer-social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social=FooterSocial::find($id);
        $social->delete();
        return response(['status'=>'success', 'message'=>'Social Link Deleted Successfully']);
    }
}
