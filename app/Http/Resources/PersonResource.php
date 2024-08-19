<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'numAcesso' => $this->numAcesso,
            'visita' => $this->visita,
            'patientID' => $this->patientID,
            'data' => Carbon::parse($this->data)->format('d/m/Y'),
            'modalidade' => $this->modalidade,
            'tipoExame' => $this->tipoExame,
            'numero' => $this->numero,
            'estado' => $this->estado,
            'medSol' => $this->medSol,
            'laudo' => $this->laudo,
            'sexo' => $this->sexo,
            'especial' => $this->especial,
            'urgente' => $this->urgente,
            'restaurado' => $this->restaurado,
        ];

        // return parent::toArray($request);
    }
}
