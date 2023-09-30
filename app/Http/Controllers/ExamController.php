<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();
        return view('index',['heading' => 'Exam Details','exams'=>$exams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add',['heading' => 'Add Exam']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'course_name' => 'required',
                'exam_date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'present_students' => 'required',
                'leave_time' => 'required'
            ]);
        
            $exam = new Exam();
            $exam->course_name = $request->input('course_name');
            $exam->exam_date = $request->input('exam_date');
            $exam->start_time = $request->input('start_time');
            $exam->end_time = $request->input('end_time');
            $exam->present_students = $request->input('present_students');
            $exam->leave_time = $request->input('leave_time');
            $exam->save();
            return redirect()->route('exam.index')->with('info', 'Exam Data has been Added successfully.');

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
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('editExam',['heading' => 'Update Exam details','exam'=>$exam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $course_name = $request->input('course_name');
        $exam_date = $request->input('exam_date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $present_students = $request->input('present_students');
        $leave_time = $request->input('leave_time');
        $id = $request->input('id');
        $exam = Exam::find($id);
        $exam->course_name = $course_name;
        $exam->exam_date = $exam_date;
        $exam->start_time = $start_time;
        $exam->end_time = $end_time;
        $exam->present_students = $present_students;
        $exam->leave_time = $leave_time;
        $exam->save();
        return redirect()->route('exam.index')->with('info', 'Exam Data has been Updated successfully.');

    }
    
    public function delete($id){
        $exam = Exam::find($id);
        $exam->delete();
        return redirect()->route('exam.index')->with('info','Exam is deleted Successfully');
    }

    public function runningExam()
    {
        $exam = Exam::all();
        return view('runExam',['exam'=>$exam]);
    }
}
