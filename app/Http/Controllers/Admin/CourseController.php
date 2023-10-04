<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::latest()->paginate(10);

        return view('admins.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //عشان عنا علاقو بدنا نجيب الكورس يلي بتبع مع المعلم
        $teachers=Teacher::all();
        //بدنا نعمل صفحة عرض لاضافة كورسات
        return view('admins.courses.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'name_en'=>'required',
                'name_ar'=>'required',
                'image'=>'required',
                'price'=>'required',
                'duration'=>'required',
                'content_en'=>'required',
                'content_ar'=>'required',
                'teacher_id'=>'required',
        ]);
        $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);
        Course::create([
                'name_en'=> $request->name_en,
                'name_ar'=> $request->name_ar,
                'image'=> $img_name,
                'price'=> $request->price,
                'duration'=> $request->duration,
                'content_en'=> $request->content_en,
                'content_ar'=> $request->content_ar,
                'teacher_id'=> $request->teacher_id,
        ]);

        return redirect()
        ->route('admin.courses.index')
        ->with('msg', __('main.add_suss'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('admins.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers=Teacher::all();

        $course = Course::find($id);

        return view('admins.courses.edit', compact('course','teachers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

// dd($request->all());
    $course = course::find($id);

    $img_name = $course->image;
    if($request->hasFile('image')) {
        // upload file
        File::delete(public_path('images/'.$course->image));
        $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);
    }

    // store data
    $course->update([

        'name_en' => $request->name_en,
        'name_ar' => $request->name_ar,
        'image' =>$img_name,
        'price'=> $request->price,
        'duration' => $request->duration,
        'content_en' => $request->content_en,
        'content_ar' => $request->content_ar,
        'teacher_id' => $request->teacher_id,
    ]);

    // redirect
    return redirect()->route('admin.courses.index')
    ->with('msg', __('main.edit'))
    ->with('type', 'info');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        File::delete(public_path('images/'.$course->image));

        $course->delete();

        return redirect()->route('admin.courses.index')
        ->with('msg', __('main.delete'))
        ->with('type', 'info');    }
}
