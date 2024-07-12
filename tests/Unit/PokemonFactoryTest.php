<?php

use App\Pokemon\API\Factory\PokemonRequestFactory;
use App\Pokemon\API\Contract\PokemonRequestContract;
use App\Pokemon\API\PokemonListRequest;
use App\Pokemon\API\PokemonViewRequest;

test('factory returns api request instance (list)', function () {

    $apiRequest = PokemonRequestFactory::make('LIST');

    expect($apiRequest)->toBeInstanceOf(PokemonRequestContract::class);
    expect($apiRequest)->toBeInstanceOf(PokemonListRequest::class);
});

test('factory returns api request instance (view)', function () {

    $apiRequest = PokemonRequestFactory::make('VIEW');

    expect($apiRequest)->toBeInstanceOf(PokemonRequestContract::class);
    expect($apiRequest)->toBeInstanceOf(PokemonViewRequest::class);
});

test('factory throws exception if given invalid request', function () {
    PokemonRequestFactory::make('SOMETHING');
})->throws('Invalid request: SOMETHING');
