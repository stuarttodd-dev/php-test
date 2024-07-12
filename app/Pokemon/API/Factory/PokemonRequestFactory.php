<?php

namespace App\Pokemon\API\Factory;

use App\Pokemon\API\Contract\PokemonRequestContract;
use App\Pokemon\API\PokemonListRequest;
use App\Pokemon\API\PokemonViewRequest;

class PokemonRequestFactory
{
    public const ENDPOINTS = [
        'LIST' => PokemonListRequest::class,
        'VIEW' => PokemonViewRequest::class,
    ];

    public static function make(string $apiRequest): PokemonRequestContract
    {
        return match ($apiRequest) {
            'LIST' => new (self::ENDPOINTS['LIST']),
            'VIEW' => new (self::ENDPOINTS['VIEW']),
            default => throw new \InvalidArgumentException("Invalid request: {$apiRequest}"),
        };
    }
}
