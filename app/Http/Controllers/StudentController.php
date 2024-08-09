<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index()
    {
        //Fetch all student details that are not deleted
        $students = Student::whereNull('deleted_at')->paginate(2);

        return view('student.index', compact('students')); // students is a array that was fetch
    }   

    public function store(Request $request)
    {
        // validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'mark' => 'required|integer|min:0',
        ]);

        // Check if the student with the same name and subject already exists
        $student = Student::where('name', $request->name)
            ->where('subject', $request->subject)
            ->first();

        if ($student) {
            // If the student exists, update the mark
            $student->mark = $request->mark;
            $student->save();
        } else {
            // If the student does not exist, create a new record
            Student::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'mark' => $request->mark,
                'user_id' => Auth::User()->id
            ]);
        }

        // Redirect to the dashboard
        return response()->json(['message' => 'Student data saved successfully']);
}


    public function update(Request $request, Student $student)
    {
        //Check if the teacher has created this student
        if (Auth::user()->id !== $student->user_id) {
            return response()->json(['message' => 'Permission Denied'], 403);
        }

        // validate the request data
        $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'mark' => 'required|integer',
        ]);

        // Update the student record
        $student->update($request->all());

        // Return a JSON response indicating success
        return response()->json(['message' => 'Student updated successfully']);
    }

    public function destroy(Student $student)
    {
        // SoftDelete the student record
        $student->delete();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
}
