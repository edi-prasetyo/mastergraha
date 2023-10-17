<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceFormRequest;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(10);
        return view('admin.service.index', compact('services'));
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function store(ServiceFormRequest $request)
    {
        $validatedData = $request->validated();

        $service = new Service;
        $service->name = $validatedData['name'];
        $service->description = $validatedData['description'];
        $service->icon = $validatedData['icon'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/service/', $filename);
            $service->image = $filename;
        }

        $service->save();
        return redirect('admin/services')->with('message', 'Bank Has Added');
    }
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }
    public function update(ServiceFormRequest $request, $service)
    {
        $validatedData = $request->validated();
        $service = Service::findOrFail($service);

        $service->name = $validatedData['name'];
        $service->description = $validatedData['description'];
        $service->icon = $validatedData['icon'];

        if ($request->hasFile('image')) {

            $path = 'uploads/service/' . $service->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/service/', $filename);
            $service->image = $filename;
        }

        $service->update();
        return redirect('admin/bank')->with('message', 'bank update Succesfully');
    }
}
