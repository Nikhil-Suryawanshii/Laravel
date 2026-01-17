<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function create(){
         $countries = DB::select("SELECT * FROM countries");
         $states = DB::select("SELECT * FROM states");
         $cities = DB::select("SELECT * FROM cities");

        return view('customers.create', compact('countries','states','cities'));
    }

    public function store(Request $request){
        DB::insert(
        "INSERT INTO customers 
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

    return redirect()->route('customers.index');
    }

    public function edit($id){
        $customers= DB::selectOne(
    "SELECT * FROM customers WHERE id = ?", 
    [$id]
);

        $countries = DB::select("SELECT * FROM countries");
    $states = DB::select("SELECT * FROM states");
    $cities = DB::select("SELECT * FROM cities");

        return view('customers.edit', compact('customers', 'countries','states','cities'));
    }

    public function index(){
        $customers = DB::select("
                    SELECT customers.*, 
                        countries.name AS country,
                        states.name AS state,
                        cities.name AS city
                    FROM customers
                    JOIN countries ON countries.id = customers.country_id
                    JOIN states ON states.id = customers.state_id
                    JOIN cities ON cities.id = customers.city_id
");

        return view('customers.index', compact('customers'));
    }

    public function update(Request $request, $id){
        $customers= DB:: update('UPDATE customers set name=?, email=?, phone=? where id=?', [$request->name, $request->email, $request->phone, $id]);

        return redirect()->route('customers.index', compact('customers'));
    }

    public function destroy($id){
        $customers= DB::delete('DELETE from customers where id=?',[$id]);

        return redirect()->route('customers.index', compact('customers'));
    }
}
