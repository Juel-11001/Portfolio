<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSectionSetting;
use Illuminate\Http\Request;

class ContactSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact=ContactSectionSetting::first();
        return view('admin.contact-section-setting.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|max:200',
            'sub_title'=>'required|max:500',
        ]);
        ContactSectionSetting::updateOrCreate(
            [
                'id'=>$id,
            ],[
                'title'=>$request->title,
               'sub_title'=>$request->sub_title,
            ]);
        toastr('Contact Section Setting Updated Successfully!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
