<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting=GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('setting'));
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
            'logo' => 'max:5120|image',
            'favicon' => 'max:5120|image',
            'footer_logo' => 'max:5120|image',
        ]);
        $setting=GeneralSetting::find($id);
        $logoPath=handleUpload('logo', $setting);
        $faviconPath=handleUpload('favicon', $setting);
        $footerLogoPath=handleUpload('footer_logo', $setting);

        $generalSetting=GeneralSetting::find($id);
        $generalSetting->logo=(!empty($logoPath)) ? $logoPath : $setting->logo;
        $generalSetting->favicon=(!empty($faviconPath)) ? $faviconPath : $setting->favicon;
        $generalSetting->footer_logo=(!empty($footerLogoPath)) ? $footerLogoPath : $setting->footer_logo;
        $generalSetting->save();
        toastr('General setting updated successfully', 'success');
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
