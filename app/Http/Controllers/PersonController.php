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

            if ($request->has('tipoExameFilter') && !empty($request->tipoExameFilter)) {
                $query->where('tipoExame', $request->tipoExameFilter);
            }

            if ($request->has('modalidadeFilter') && !empty($request->modalidadeFilter)) {
                $query->where('modalidade', $request->modalidadeFilter);
            }

            if ($request->has('searchBar') && !empty($request->searchBar)) {
                $query->where(function ($query) use ($request) {
                    $query->where('patientID', 'like', '%' . $request->searchBar . '%')
                        ->orWhere('nome', 'like', '%' . $request->searchBar . '%')
                        ->orWhere('numAcesso', 'like', '%' . $request->searchBar . '%')
                        ->orWhere('tipoExame', 'like', '%' . $request->searchBar . '%')
                        ->orWhere('modalidade', 'like', '%' . $request->searchBar . '%')
                        ->orWhere('data', 'like', '%' . $request->searchBar . '%');
                });
               
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
