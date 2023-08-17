<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RekamanResource extends JsonResource
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
            'pasien_id' => $this->pasien_id,
            'nomor' => $this->nomor,
            'created_at' => date_format($this->created_at,"Y-m-d H:i:s"),
            'pasien' => $this->whenLoaded('dataPasien')
        
        ];
    }
}
