<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('database', function (Blueprint $table) {
            //store json in database
            $jsondata = '[
                {
                    "nome": "ANONIMO 1",
                    "numAcesso": "780153-158",
                    "visita": "",
                    "patientID": "ANONIMO",
                    "data": "2020-06-09",
                    "modalidade": "MR",
                    "tipoExame": "SHOULDER",
                    "numero": "780153-158",
                    "estado": "4",
                    "medSol": "",
                    "laudo": "F",
                    "sexo": "A",
                    "especial": "F",
                    "urgente": "F",
                    "restaurado": "F"
                },
                {
                    "nome":"ANONIMO 2",
                    "numAcesso":"60739-31",
                    "visita":"",
                    "patientID":"47002",
                    "data":"2020-05-25",
                    "modalidade":"MR",
                    "tipoExame":"RM COL CERVICAL  C1-C7",
                    "numero":"60739-31",
                    "estado":"1",
                    "dataNasc":"2014-03-24",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"F",
                    "especial":"F",
                    "urgente":"T",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 3",
                    "numAcesso":"413953-19",
                    "visita":"",
                    "patientID":"389823",
                    "data":"2020-04-20",
                    "modalidade":"MR",
                    "tipoExame":"RM CRANIO",
                    "numero":"413953-19",
                    "estado":"1",
                    "dataNasc":"1945-06-21",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"F",
                    "especial":"T",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 4",
                    "numAcesso":"624732SAMER",
                    "visita":"",
                    "patientID":"ANONIMO",
                    "data":"2020-04-20",
                    "modalidade":"MR",
                    "tipoExame":"",
                    "numero":"624732SAMER",
                    "estado":"1",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"A",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 5",
                    "numAcesso":"771877-96",
                    "visita":"",
                    "patientID":"ANONIMO",
                    "data":"2020-04-20",
                    "modalidade":"CT",
                    "tipoExame":"ABDOMEN",
                    "numero":"771877-96",
                    "estado":"1",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"A",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 6",
                    "numAcesso":"771583-34",
                    "visita":"",
                    "patientID":"ANONIMO",
                    "data":"2020-04-17",
                    "modalidade":"MR",
                    "tipoExame":"",
                    "numero":"771583-34",
                    "estado":"3",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"A",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 7",
                    "numAcesso":"5429276",
                    "visita":"",
                    "patientID":"1702144",
                    "data":"2020-04-16",
                    "modalidade":"CR",
                    "tipoExame":"RX ANTEBRACO AP E PERFIL",
                    "numero":"5429276",
                    "estado":"3",
                    "dataNasc":"1997-07-12",
                    "medSol":"MEDICO",
                    "laudo":"F",
                    "sexo":"M",
                    "especial":"F",
                    "urgente":"T",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 8",
                    "numAcesso":"771095-34",
                    "visita":"",
                    "patientID":"ANONIMO",
                    "data":"2020-04-14",
                    "modalidade":"MR",
                    "tipoExame":"",
                    "numero":"771095-34",
                    "estado":"1",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"A",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 9",
                    "numAcesso":"761706-34",
                    "visita":"",
                    "patientID":"257259",
                    "data":"2020-02-28",
                    "modalidade":"CT",
                    "tipoExame":"CRANIO SEQUENCIAL ADULT",
                    "numero":"761706-34",
                    "estado":"1",
                    "dataNasc":"1996-12-13",
                    "medSol":"",
                    "laudo":"F",
                    "sexo":"F",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F"
                },
                {
                    "nome":"ANONIMO 10",
                    "numAcesso":"417547",
                    "visita":"",
                    "patientID":"076867",
                    "data":"2020-01-31",
                    "modalidade":"CR",
                    "tipoExame":"MAMO",
                    "numero":"417547",
                    "estado":"B",
                    "dataNasc":"1953-02-26",
                    "medSol":"",
                    "loginLaudo":"AA",
                    "loginRevisao":"AA",
                    "finalizado":"F",
                    "laudo":"F",
                    "sexo":"F",
                    "especial":"F",
                    "urgente":"F",
                    "restaurado":"F",
                    "ditadoPor":"AA"
                }
            ]';
            
            // para cada item do json, gere um email e senha 12345
            // o email segue o padrão anonimo1@teste.com e assim por diante de acordo com o nome no json
            // o email, senha e os dados do json devem ser inseridos na tabela users e people

            // transforme o json em array
            $data = json_decode($jsondata, true);

            // para cada item do array, gere um email e senha 12345
            foreach ($data as $key => $value) {
                //pega o nome do json e remove os espaços
                $nome = str_replace(' ', '', $value['nome']);
                $nome = strtolower($nome);
                $email = $nome . '@teste.com';
                $password = bcrypt('12345');

                $userid = Str::uuid();
                $personid = Str::uuid();

                // Criar User
                DB::table('users')->insert([
                    'id' => $userid,
                    'email' => $email,
                    'password' => $password,
                    'created_at' => now(),
                ]);

                // Criar Person relacionado ao User
                DB::table('people')->insert([
                    'id' => $personid,
                    'user_id' => $userid,
                    'nome' => $value['nome'],
                    'numAcesso' => $value['numAcesso'],
                    'visita' => $value['visita'],
                    'patientID' => $value['patientID'],
                    'data' => $value['data'],
                    'modalidade' => $value['modalidade'],
                    'tipoExame' => $value['tipoExame'],
                    'numero' => $value['numero'],
                    'estado' => $value['estado'],
                    'medSol' => $value['medSol'],
                    'laudo' => $value['laudo'],
                    'sexo' => $value['sexo'],
                    'especial' => $value['especial'],
                    'urgente' => $value['urgente'],
                    'restaurado' => $value['restaurado'],
                    'created_at' => now(),
                ]);
            }



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('database', function (Blueprint $table) {
            //
        });
    }
};
