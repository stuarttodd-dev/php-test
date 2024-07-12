<?php

namespace App\Pokemon\API;

use App\Pokemon\API\Abstraction\PokemonAPIAbstraction;
use App\Pokemon\API\Contract\PokemonRequestContract;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PokemonListRequest extends PokemonAPIAbstraction implements PokemonRequestContract
{
    protected string $endpoint = 'https://pokeapi.co/api/v2/pokemon/?offset=0&limit=500';

    protected function fetchResponse(): mixed
    {
        $cacheKey = md5($this->endpoint);
        $response = Cache::get($cacheKey);

        if ($response === null) {
            $response = Http::get($this->endpoint)->json();
            Cache::put($cacheKey, $response, 3600);
        }

        $results = $response['results'] ?? [];
        if (empty($results)) {
            return [];
        }

        $next = $response['next'] ?? null;

        while (!empty($next)) {

            $cacheKey = md5($next);
            $response = Cache::get($cacheKey);

            if ($response === null) {
                $response = Http::get($this->endpoint)->json();
                Cache::put($cacheKey, $response, 3600);
            }

            $response = Http::get($next)->json();
            $results = array_merge($results, $response['results']);
            $next = $response['next'] ?? null;
        }

        return $results;
    }
}
