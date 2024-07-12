<?php

namespace App\Pokemon;

use App\Pokemon\API\Factory\PokemonRequestFactory;
use App\Pokemon\PokemonDTO as PokemonDTO;

class PokemonRepository
{
    public function __construct(private PokemonRequestFactory $factory)
    {

    }

    public function getAll(): array
    {
        return $this->factory::make('LIST')
            ->getResponse();
    }

    public function find(string $pokemon): PokemonDTO
    {
        $response = $this->factory::make('VIEW')
            ->setPlaceholder('name', $pokemon)
            ->getResponse();

        return PokemonDTO::fromResponse($response);
    }

}
