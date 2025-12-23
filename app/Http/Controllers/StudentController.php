<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
     // LIST
    public function index()
    {
        $students = DB::select("SELECT * FROM students ORDER BY id DESC");
        return view('students.index', compact('students'));
    }

    // CREATE FORM
    public function create()
    {
        return view('students.create');
    }

    // STORE
    public function store(Request $request)
    {
        DB::insert(
            "INSERT INTO students 
            (name, email, phone, dob, gender, address, course, admission_date, status, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())",
            [
                $request->name,
                $request->email,
                $request->phone,
                $request->dob,
                $request->gender,
                $request->address,
                $request->course,
                $request->admission_date,
                $request->status ?? 1
            ]
        );

        return redirect()->route('students.index')->with('success', 'Student added');
    }

    // EDIT FORM
    public function edit($id)
    {
        $student = DB::select("SELECT * FROM students WHERE id = ?", [$id]);

        if (!$student) {
            abort(404);
        }

        return view('students.edit', ['student' => $student[0]]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        DB::update(
            "UPDATE students SET
                name = ?, email = ?, phone = ?, dob = ?, gender = ?,
                address = ?, course = ?, admission_date = ?, status = ?,
                updated_at = NOW()
             WHERE id = ?",
            [
                $request->name,
                $request->email,
                $request->phone,
                $request->dob,
                $request->gender,
                $request->address,
                $request->course,
                $request->admission_date,
                $request->status ?? 1,
                $id
            ]
        );

        return redirect()->route('students.index')->with('success', 'Student updated');
    }

    // DELETE
    public function delete($id)
    {
        DB::delete("DELETE FROM students WHERE id = ?", [$id]);

        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
