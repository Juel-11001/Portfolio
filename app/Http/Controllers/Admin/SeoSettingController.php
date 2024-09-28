<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::first();
        return view('admin.setting.seo-setting.index', compact('seo'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|max:200',
            'description'=>'required|max:500',
            'keywords'=>'required|max:500',
        ]);
        SeoSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'keyword' => $request->keywords
            ]);
        toastr('Seo setting updated successfully', 'success');
        return redirect()->back();
    }
}
