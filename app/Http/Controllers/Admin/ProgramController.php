<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramFormRequest;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'DESC')->paginate(10);
        return view('admin.program.index', compact('programs'));
    }
    public function create()
    {
        return view('admin.program.create');
    }
    public function store(ProgramFormRequest $request)
    {
        $validatedData = $request->validated();

        $slugRequest = Str::slug($validatedData['name']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $program = new Program;
        $program->name = $validatedData['name'];
        if (Program::where('slug', $slugRequest)->exists()) {
            $program->slug = $slug;
        } else {
            $program->slug = $slugRequest;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);
            $program->image = $filename;
        }
        $program->status = $request->status == true ? '1' : '0';

        $program->save();
        return redirect('admin/programs')->with('message', 'Program Has Added');
    }
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }
    public function update(ProgramFormRequest $request, $program)
    {
        $validatedData = $request->validated();
        $program = Program::findOrFail($program);

        $program->name = $validatedData['name'];

        if ($request->hasFile('image')) {

            $path = 'uploads/logo/' . $program->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);
            $program->image = $filename;
        }
        $program->status = $request->status == true ? '1' : '0';

        $program->update();
        return redirect('admin/programs')->with('message', 'Program update Succesfully');
    }
}
