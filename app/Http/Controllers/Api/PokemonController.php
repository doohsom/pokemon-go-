<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePokemonRequest;
use App\Http\Resources\PokemonCollection;
use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    use ResponseTrait;

    public function index() : JsonResponse
    {
        return $this->success('Pokemon retrieved successfully', 200,
        new PokemonCollection(Pokemon::with('specie', 'types', 'stats')->paginate()));
    }

    public function read($id)
    {
        $find = Pokemon::find($id);
        if(!$find){
            return $this->failed('Invalid Pokemon');
        }else {
            return $this->success('Pokemon retrieved successfully', 200,
                new PokemonResource(Pokemon::findOrFail($id)->with('specie', 'types', 'stats')->first()));
        }
    }

    public function search(Request $request) : JsonResponse
    {
        $sql = Pokemon::where([
            ['identifier', '!=', null],
            [function ($query) use ($request){
                if($value = $request->search){
                    $query->orWhere('identifier', 'LIKE', '%' . $value . '%')->get();
                }
            }]
        ])->with('specie', 'types', 'stats')->paginate();
        return $this->success("Pokemon retrieved successfully", 200 ,
            new PokemonCollection($sql));
    }

    public function edit(UpdatePokemonRequest $request, $id) : JsonResponse
    {
        $find = Pokemon::find($id);
        if(!$find){
            $this->failed('Invalid pokemon id');
        }
        $find->update($request->validated());
        $this->success('Pokemon updated successfully');


    }

}
