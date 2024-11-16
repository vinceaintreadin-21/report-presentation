<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function showTeachers($studentId){
        $student = Student::with('teachers')->findOrFail($studentId);

        return view('teachers-from-students', ['student' => $student]);
    }

    public function showTeacherswithStudents(){
        $students = Student::with('teachers')->get();
        return view('teachers-with-students', ['students' =>$students]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher.*.name' => 'required|string|max:255'
        ]);

        $student = new Student();
        $student->name = $validated['name'];
        $student->save();

        if ($request->has('teachers')){
            foreach ($request->input('teachers') as $teacherData){
                $teacher = new Teacher();
                $teacher->name = $teacherData['name'];
                $teacher->student_id = $student->id;
                $teacher->save();
            }
        }
        return redirect()->route('showTeacherswithStudents')->with('success');
    }
}
