<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewCoursePayment;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    function index()  {//الصفحة الرئيسية
        $teachers=Teacher::latest()->get();
        $courses=Course::latest('id')->limit('6')->get();
        $students=User::count();
        $courses_count=Course::count();
        $teacher_count=Teacher::count();
        return view('front.index', compact('courses','teachers','students','courses_count','teacher_count'));

    }
    function teacher()  { //صفحة عرض المعلمين
        $teachers=Teacher::all();
        $students=User::count();

        return view('front.teachers', compact('teachers','students'));

    }
    function teachers_single($id) {
        $teacher = Teacher::find($id);
        $events = $teacher->available_times->map(function($data) {
            return [
                'title' => $data->time_from . '-' . $data->time_to,
                'start' => $data->day,
                'course' => $data->course->name, // اسم الكورس
                'url' => url('/')
            ];
        });
        $students = User::count();
        return view('front.teachers-singel', compact('teacher', 'students', 'events'));
    }
    function course() {//صفحة عرض جميع الدورات
        $courses=Course::latest()->get();
        $students=User::count();
        return view('front.courses' , compact('courses','students'));

    }
    function courses_single ($id)  {//عرض دورة واحدة
        $course = course::find($id);
        $students = User::count();
        return view('front.courses-singel', compact('course', 'students'));

    }
    function search(Request $request){ //للبحث
        $course = Course::where('name_en', 'like', '%'.$request->q.'%')
        ->orWhere('name_ar', 'like', '%'.$request->q.'%');
        $students=User::count();
        // return view('front.courses' , compact('course','students'));
    }
    function enroll($id)  { //بوابة دفع
        $course = course::find($id);
        $students=User::count();

        $url = "https://eu-test.oppwa.com/v1/checkouts"; //رابط تجربيبي بتغير
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" . //الرقم تجريبي بتغير لحقيقي
                    "&amount=".$course->price .
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));//الرقم تجريبي بتغير لحقيقي
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// هذا تجريبي اذا بدك حقيقي حط true
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
         $responseData=json_decode($responseData,true);
            $id=$responseData['id'] ?? '';



        return view('front.enroll', compact('course','students','id'));
    }
    function payment(Request $request , $id)  {
        $course = course::find($id);

        $resourcePath=$request->resourcePath;
        $url = "https://eu-test.oppwa.com/$resourcePath";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
         $responseData= json_decode($responseData, true);

         $code= $responseData['result']['code'];
         if($code='000.100.110'){
            $id=$responseData['id'];
            $amount=$responseData['amount'];
            $teacher_revenue= $amount * .4;
            $amount =$amount -$teacher_revenue;
            Payment::create([
                'user_id'=>Auth::guard('web')->id(),
                'amount'=> $amount,
                'teacher_revenue'=>$teacher_revenue,
                'service_name'=>$course->name,
                'service_id'=>$course->id,
                'transaction_id'=>$id,

            ]);
            $course->teacher()->increment('revenue',$teacher_revenue);
            //الاشعارات
            $course->teacher->notify(new NewCoursePayment(Auth::user()->name,$course->name) );
            $course->students()->attach([Auth::id()]);
            return redirect()->back()->with('success','payment Done');

         }else{
            return redirect()->back()->with('failed','payment procees Decline');
         }


    }
}
