<?php

namespace App\Pokemon\API\Contract;

interface PokemonRequestContract
{
    public function setPlaceholder(string $key, string $value): PokemonRequestContract;
    public function getEndpoint(): string;
    public function getResponse(): mixed;
}
