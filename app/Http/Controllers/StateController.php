<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    // READ
    public function index()
    {
        $states = DB::select("
            SELECT states.*, countries.name AS country_name
            FROM states
            JOIN countries ON countries.id = states.country_id
        ");

        $countries = DB::select("SELECT * FROM countries");

        return view('states.index', compact('states', 'countries'));
    }

    // CREATE
    public function create(){
        $countries = DB::select("
        SELECT id, name
        FROM countries
        ORDER BY name ASC
    ");
        
        return view('states.create', compact('countries'));
    }


    public function store(Request $request)
    {
        DB::insert(
            "INSERT INTO states (country_id, name, created_at, updated_at)
             VALUES (?, ?, NOW(), NOW())",
            [$request->country_id, $request->name]
        );

        return redirect()->route('states.index');
    }

    public function edit($id){
         $countries = DB::select("
        SELECT id, name
        FROM countries
        ORDER BY name ASC
    ");
        $states= DB:: selectOne('SELECT * from states where id=?', [$id]);
        
        return view('states.edit', compact('states','countries'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        DB::update(
            "UPDATE states SET country_id = ?, name = ?, updated_at = NOW() WHERE id = ?",
            [$request->country_id, $request->name, $id]
        );

        return redirect()->route('states.index');
    }

    // DELETE
    public function destroy($id)
    {
        DB::delete("DELETE FROM states WHERE id = ?", [$id]);
        return redirect()->route('states.index');
    }
}
