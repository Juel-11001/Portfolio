<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {

        $service = new Service();
        $service->name = $request->service_name;
        $service->description = $request->service_desc;
        $service->save();
        toastr('Service Created Successfully','success');
        return redirect()->route('admin.service.index');
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
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        // $request->validate([
        //     'service_name' => ['required','max:255'],
        //     'service_desc'=>['required','max:500'],
        // ],[
        //     'service_desc.required' => 'Service description is required',
        // ]);
        $service = Service::find($id);
        $service->name = $request->service_name;
        $service->description = $request->service_desc;
        $service->save();
        toastr('Service Updated Successfully','success');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return response(['status'=>'success', 'message'=>'Service Deleted Successfully']);
    }
}
