<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info=FooterInfo::first();
        return view('admin.footer.footer-info', compact('info'));
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
            'copy_right'=>'max:200',
            'power_by'=>'max:200',
            'info'=>'max:500'
        ]);
        FooterInfo::updateOrCreate(
            [
                'id'=>$id
            ],[
                'copy_right'=>$request->copy_right,
                'power_by'=>$request->power_by,
                'info'=>$request->info,
            ]);
        toastr('Footer Info Update Successfully!', 'success');
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
