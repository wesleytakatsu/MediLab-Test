<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // return response()->json([
        //     'message' => 'Hello World!',
        // ]);

        // $user = User::all();

        $user = User::paginate();
        
        return UserResource::collection($user);
    }
    
    public function store(StoreUpdateUserRequest $request)
    {
        // xdebug_break();

        // $request->validate([
        //     'login' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $user = User::create($request->validated());

        return new UserResource($user);
    }

    // storePerson
    public function storePerson(Request $request)
    {
        // Validar dados do request
        $validatedData = $request->validate([
            // Validações do User
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            // Validações do Person
            'nome' => 'required|string|max:255',
            'numAcesso' => 'required|string|max:255',
            'visita' => 'required|string|max:255',
            'patientID' => 'required|string|max:255',
            'data' => 'required|date',
            'modalidade' => 'required|string|max:255',
            'tipoExame' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'medSol' => 'required|string|max:255',
            'laudo' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'especial' => 'required|string|max:255',
            'urgente' => 'required|string|max:255',
            'restaurado' => 'required|string|max:255',
            
        ]);

        // Iniciar transação
        DB::beginTransaction();
        
        try {
            // Criar User
            $user = User::create([
                'email' => $validatedData['email'],
                'type' => 'personal',
                'password' => bcrypt($validatedData['password']),
            ]);

            // Criar Person relacionado ao User
            $person = $user->person()->create([
                'nome' => $validatedData['nome'],
                'numAcesso' => $validatedData['numAcesso'],
                'visita' => $validatedData['visita'],
                'patientID' => $validatedData['patientID'],
                'data' => $validatedData['data'],
                'modalidade' => $validatedData['modalidade'],
                'tipoExame' => $validatedData['tipoExame'],
                'numero' => $validatedData['numero'],
                'estado' => $validatedData['estado'],
                'medSol' => $validatedData['medSol'],
                'laudo' => $validatedData['laudo'],
                'sexo' => $validatedData['sexo'],
                'especial' => $validatedData['especial'],
                'urgente' => $validatedData['urgente'],
                'restaurado' => $validatedData['restaurado'],
            ]);

            // Confirmar transação
            DB::commit();

            return response()->json(['message' => 'User and Person created successfully', 'user' => $user, 'person' => $person], 201);

        } catch (\Exception $e) {
            // Rollback transação em caso de erro
            DB::rollBack();

            return response()->json(['message' => 'Error creating User and Person', 'error' => $e->getMessage()], 500);
        }
        
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([], 204);
    }
}
