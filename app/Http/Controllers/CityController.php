<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    // READ
    public function index()
    {
        $cities = DB::select("
            SELECT cities.*, states.name AS state_name, countries.name AS country_name
            FROM cities
            JOIN states ON states.id = cities.state_id
            JOIN countries ON countries.id = states.country_id
        ");

        $states = DB::select("SELECT * FROM states");

        return view('cities.index', compact('cities', 'states'));
    }

    public function create(){
        $states = DB::select("
            SELECT states.id, states.name, countries.name AS country_name
            FROM states
            JOIN countries ON countries.id = states.country_id
            ORDER BY countries.name, states.name
        ");

        return view('cities.create', compact('states'));
    }

    // CREATE
    public function store(Request $request)
    {
        DB::insert(
            "INSERT INTO cities (state_id, name, created_at, updated_at)
             VALUES (?, ?, NOW(), NOW())",
            [$request->state_id, $request->name]
        );

        return redirect()->route('cities.index');
    }

    public function edit($id){
         $city = DB::selectOne(
            "SELECT * FROM cities WHERE id = ?",
            [$id]
        );

        $states = DB::select("
            SELECT states.id, states.name, countries.name AS country_name
            FROM states
            JOIN countries ON countries.id = states.country_id
            ORDER BY countries.name, states.name
        ");

        return view('cities.edit', compact('city', 'states'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        DB::update(
            "UPDATE cities SET state_id = ?, name = ?, updated_at = NOW() WHERE id = ?",
            [$request->state_id, $request->name, $id]
        );

        return redirect()->route('cities.index');
    }

    // DELETE
    public function destroy($id)
    {
        DB::delete("DELETE FROM cities WHERE id = ?", [$id]);
        return redirect()->route('cities.index');
    }
}
