<?php

namespace App\Http\Resources;

use App\Models\PokemonSpecies;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'identifier' => $this->identifier,
            'weight' => $this->weight,
            'height' => $this->height,
            'image' => $this->image,
            'species' => new PokemonSpeciesResource($this->specie),
            'types' => TypeResource::collection($this->types),
            'stats' => StatResource::collection($this->stats)
        ];
    }
}
