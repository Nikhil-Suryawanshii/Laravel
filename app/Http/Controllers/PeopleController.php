<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function create(){
         $countries = DB::select("SELECT * FROM countries");
         $states = DB::select("SELECT * FROM states");
         $cities = DB::select("SELECT * FROM cities");

        return view('people.create', compact('countries','states','cities'));
    }

    public function store(Request $request){
        DB::insert(
        "INSERT INTO people
        (name,email,phone,country_id,state_id,city_id,created_at,updated_at)
        VALUES (?,?,?,?,?,?,NOW(),NOW())",
        [
            $request->name,
            $request->email,
            $request->phone,
            $request->country_id,
            $request->state_id,
            $request->city_id
        ]
    );

    return redirect()->route('people.index');
    }

    public function edit($id){
        $people= DB::selectOne(
    "SELECT * FROM people WHERE id = ?",
    [$id]
);

        $countries = DB::select("SELECT * FROM countries");
    $states = DB::select("SELECT * FROM states");
    $cities = DB::select("SELECT * FROM cities");

        return view('people.edit', compact('people', 'countries','states','cities'));
    }

    public function index(){
        $people = DB::select("
                    SELECT people.*,
                        countries.name AS country,
                        states.name AS state,
                        cities.name AS city
                    FROM people
                    JOIN countries ON countries.id = people.country_id
                    JOIN states ON states.id = people.state_id
                    JOIN cities ON cities.id = people.city_id
");

        return view('people.index', compact('people'));
    }

    public function update(Request $request, $id){
        DB::update(
        "UPDATE people SET name=?, email=?, phone=?, country_id=?, state_id=?, city_id=? WHERE id=?",
        [
            $request->name,
            $request->email,
            $request->phone,
            $request->country_id,
            $request->state_id,
            $request->city_id,
            $id
        ]
    );

    return redirect()->route('people.index');
    }

    public function destroy($id){
        $people= DB::delete('DELETE from people where id=?',[$id]);

        return redirect()->route('people.index', compact('people'));
    }

    // AJAX - Get States by Country
public function getStates($country_id)
{
    $states = DB::select(
        "SELECT id, name FROM states WHERE country_id = ?",
        [$country_id]
    );

    return response()->json($states);
}

// AJAX - Get Cities by State
public function getCities($state_id)
{
    $cities = DB::select(
        "SELECT id, name FROM cities WHERE state_id = ?",
        [$state_id]
    );

    return response()->json($cities);
}
}
