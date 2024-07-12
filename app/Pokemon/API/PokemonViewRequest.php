<?php

namespace App\Pokemon\API;

use App\Pokemon\API\Abstraction\PokemonAPIAbstraction;
use App\Pokemon\API\Contract\PokemonRequestContract;

class PokemonViewRequest extends PokemonAPIAbstraction implements PokemonRequestContract
{
    protected string $endpoint = 'https://pokeapi.co/api/v2/pokemon/{name}';
}
