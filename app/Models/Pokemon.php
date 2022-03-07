<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = ['id','identifier','species_id','height','weight','base_experience','order','is_default'];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/".$this->id.".png",
        );
    }

    public function specie()
    {
        return $this->belongsTo(PokemonSpecies::class, 'id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_types', 'pokemon_id', 'type_id');
    }

    public function stats()
    {
        return $this->belongsToMany(Stat::class, 'pokemon_stats', 'pokemon_id', 'stat_id')->withPivot('base_stat');
    }

}
