<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //
    public function index() {
        //retorna todos os registros junto com user
        $person = Person::with('user')->paginate();

        return response()->json($person);
    }
}
