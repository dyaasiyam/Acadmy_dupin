<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->has('token') && request()->token ==123){
            return [
                'status'=>true,
                'message'=> 'All Courses ',
                'data'=>Course::all()
            ];
        }else{
            return [
                'status'=>true,
                'message'=> 'not found ',
                'data'=>[]
            ];
        }

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
    $course=Course::create([
            'name_en'=> $request->name_en,
            'name_ar'=> $request->name_ar,
            'image'=> $img_name,
            'price'=> $request->price,
            'duration'=> $request->duration,
            'content_en'=> $request->content_en,
            'content_ar'=> $request->content_ar,
            'teacher_id'=> $request->teacher_id,
    ]);
    return [
        'status'=>true,
        'message'=> 'All Courses ',
        'data'=> $course
    ];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
