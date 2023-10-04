<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::latest()->paginate(10);
        return view('admins.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.teacher.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

   $request->validate([
    'name'=>'required',
    'email'=>'required',
    'password'=>'required',
    'phone'=>'required',
    'ex_years'=>'nullable',
    'bio'=>'nullable',
    ]);
    $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
    $request->file('image')->move(public_path('images'), $img_name);

    // store data
    Teacher::create([
        'name' => $request->name,
        'email' => $request->email,
        // 'password' => Hash::make($request->password),
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'image' => $img_name,
        'ex_years' => $request->ex_years,
        'bio' => $request->bio,
    ]);

        return redirect()
        ->route('admin.teachers.index')
        ->with('msg', __('main.add_suss'))
        ->with('type', 'success');


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
        $teacher = Teacher::find($id);

        return view('admins.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $teacher = Teacher::find($id);

        $img_name = $teacher->image;
        if($request->hasFile('image')) {
            // upload file
            File::delete(public_path('images/'.$teacher->image));
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
        }

        // store data
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $img_name,
            'ex_years' => $request->ex_years,
            'bio' => $request->bio,
        ]);

        // redirect
        return redirect()->route('admin.teachers.index')
        ->with('msg', __('main.edit'))
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);

        File::delete(public_path('images/'.$teacher->image));

        $teacher->delete();

        return redirect()->route('admin.teachers.index')
        ->with('msg', __('main.delete'))
        ->with('type', 'info');
    }
}
