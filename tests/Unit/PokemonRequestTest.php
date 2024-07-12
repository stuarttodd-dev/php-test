<?php

use App\Pokemon\API\Factory\PokemonRequestFactory;
use Illuminate\Support\Facades\Http;

test('request class has the ability to change placeholders', function () {

    $apiRequest = PokemonRequestFactory::make('VIEW');
    $apiRequest->setPlaceholder('name', 'bulbasaur');
    expect($apiRequest->getEndpoint())->toBe('https://pokeapi.co/api/v2/pokemon/bulbasaur');

});

test('throws exception if placeholders are still exist when executing request', function () {

    PokemonRequestFactory::make('VIEW')
        ->getResponse();

})->throws('Endpoint contains unresolved placeholders.');

test('throws exception if placeholders are still exist when executing request if setting incorrect placeholder', function () {

    PokemonRequestFactory::make('VIEW')
        ->setPlaceholder('BAD_PLACEHOLDER', 'some value')
        ->getResponse();

})->throws('Endpoint contains unresolved placeholders.');

test('getResponse returns a valid response', function () {

    $mockResponse = [
        'name' => 'bulbasaur',
        'height' => 7,
        'weight' => 69
    ];

    Http::fake([
        'https://pokeapi.co/api/v2/pokemon/*' => Http::response($mockResponse)
    ]);

    $response = PokemonRequestFactory::make('VIEW')
        ->setPlaceholder('name', 'bulbasaur')
        ->getResponse();

    expect($response)->toBe($mockResponse);

});

