<?php

namespace App\Http\Controllers\ApiCommonController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiPeopleController extends Controller
{
    // READ ALL
    public function index()
    {
        $people = DB::select("SELECT * FROM people");
        return response()->json($people);
    }

    // CREATE
    public function store(Request $request)
    {
        DB::insert(
            "INSERT INTO people (name, email, phone, created_at, updated_at)
             VALUES (?, ?, ?, NOW(), NOW())",
            [$request->name, $request->email, $request->phone]
        );

        return response()->json([
            'status' => true,
            'message' => 'Person added successfully'
        ]);
    }

    // READ SINGLE
    public function show($id)
    {

        $person = DB::select("SELECT * FROM people WHERE id = ?", [$id]);

        return response()->json($person);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        DB::update(
            "UPDATE people SET name=?, email=?, phone=?, updated_at=NOW() WHERE id=?",
            [$request->name, $request->email, $request->phone, $id]
        );

        return response()->json([
            'status' => true,
            'message' => 'Person updated successfully'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        DB::delete("DELETE FROM people WHERE id=?", [$id]);

        return response()->json([
            'status' => true,
            'message' => 'Person deleted successfully'
        ]);
    }
}
