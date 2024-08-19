<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::with('user')->paginate();

        return response()->json($person);
    }

    public function getDataForDataTable(Request $request)
    {
        if ($request->ajax()) {
            // $data = Person::select('patientID', 'nome', 'numAcesso', 'tipoExame', 'modalidade', 'data')->get();
            // xdebug_break();
            $query = Person::select('patientID', 'nome', 'numAcesso', 'tipoExame', 'modalidade', 'data');

            if ($request->has('dateFilter') && !empty($request->dateFilter)) {
                $query->whereDate('data', $request->dateFilter);
            }

            if ($request->has('tipoExameFilter') && !empty($request->dateFilter)) {
                $query->whereDate('tipoExame', $request->dateFilter);
            }

            return Datatables::of($query)->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
