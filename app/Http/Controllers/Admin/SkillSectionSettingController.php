<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills=SkillSectionSetting::first();
        return view('admin.skill-setting.index', compact('skills'));
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
        // dd($request->all());
        $request->validate([
            'title'=>'required:max:200',
            'sub_title'=> 'required|max:500',
            'image'=>'image|max:5120'
        ]);
        $skill=SkillSectionSetting::first();
        $imagePath=handleUpload('image', $skill);
        SkillSectionSetting::updateOrCreate(
            ['id'=> $id],
            [
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'image'=>(!empty($imagePath) ? $imagePath : $skill->image)
        ]);
        toastr('Skill Section Setting Update successfully!', 'success');
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
