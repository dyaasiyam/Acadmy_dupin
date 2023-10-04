<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Models\AvailableTime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Auth::user();
        $times = $teacher->available_times()->latest()->get();

        return view('teachers.times.index', compact('times'));
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = Auth::user();
        $courses = $teacher->courses;
        return view('teachers.times.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // قم بالتحقق من صحة البيانات المدخلة من الاستمارة
        $request->validate([
            'course_id' => 'required|exists:courses,id', // تحقق من وجود الدورة
            'day' => 'required|date',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_from', // تحقق من أن الوقت النهائي بعد الوقت البدء
        ]);

        // إنشاء سجل جديد في جدول available_times
        // $status = ($request->input('status') === 'مقبول') ? 1 : 0;

        AvailableTime::create([
            'teacher_id' => auth()->user()->id, // يمكنك تعديل هذا بناءً على كيفية الحصول على معرف المعلم
            'course_id' => $request->course_id,
            'day' => $request->day,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            // 'status' => $status, // يمكنك تعديل حالة حسب متطلباتك
        ]);

        // إعادة توجيه إلى الصفحة الرئيسية أو أي صفحة ترغب فيها بعد الإضافة
        return redirect()->route('teacher.times.index')
        ->with('msg', __('main.add_suss'))
        ->with('type', 'success');;
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
