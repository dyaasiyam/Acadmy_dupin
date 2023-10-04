<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AvailableTime;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    function index() {
        return view('teachers.home');
        //لما أفوت ع لوحة تحكم تظهرلي

    }
    function courses() {
        $teacher = Auth::user();
        $courses = $teacher->courses;
             return view('teachers.courses.index', compact('courses'));
    }
    function showCourse($id)  {
        $course=Course::find($id);
        $studentsInCourse = $course->students()->get();

        return view('teachers.courses.show',compact('course','studentsInCourse'));

    }
    function appointment() {
        $teacher = Auth::user();
  $appointments=$teacher->appointments()->get();
  return view('teachers.appointment.index',compact('appointments'));

    }
    function time_status($timeId,  $status){
        AvailableTime::find($timeId)->update([
            'status' =>$status
        ]);
        return redirect()->back();

    }
    // public function acceptActivity($id)
    // {
    //     $activity = AvailableTime::find($id);
    //     if ($activity) {
    //         $activity->update(['status' => 'مقبول']);
    //     }
    //     return redirect()->back();
    // }

    // public function rejectActivity($id)
    // {
    //     $activity = AvailableTime::find($id);
    //     if ($activity) {
    //         $activity->update(['status' => 'مرفوض']);
    //     }
    //     return redirect()->back();
    // }



}
