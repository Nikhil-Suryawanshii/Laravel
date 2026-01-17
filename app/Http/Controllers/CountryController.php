<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
   // READ
    public function index()
    {
        $countries = DB::select("SELECT * FROM countries");
        return view('countries.index', compact('countries'));
    }

    // CREATE

    public function create(){
        return view('countries.create');
    }


    public function store(Request $request)
    {
        DB::insert(
            "INSERT INTO countries (name, created_at, updated_at) VALUES (?, NOW(), NOW())",
            [$request->name]
        );

        return redirect()->route('countries.index');
    }

    public function edit($id){
        $countries= DB::select('SELECT * from countries where id=?', [$id]);
        return view('countries.edit', compact('countries'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        DB::update(
            "UPDATE countries SET name = ?, updated_at = NOW() WHERE id = ?",
            [$request->name, $id]
        );

        return redirect()->route('countries.index');
    }

    // DELETE
    public function destroy($id)
    {
        DB::delete("DELETE FROM countries WHERE id = ?", [$id]);
        return redirect()->route('countries.index');
    } 
}
