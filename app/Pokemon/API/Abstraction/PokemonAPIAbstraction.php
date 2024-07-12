<?php

namespace App\Pokemon\API\Abstraction;

use App\Pokemon\API\Contract\PokemonRequestContract;
use Illuminate\Support\Facades\Http;
use Exception;

abstract class PokemonAPIAbstraction
{
    protected string $endpoint = '';

    public function setPlaceholder(string $key, string $value): PokemonRequestContract
    {
        $this->endpoint = str_replace('{' . $key . '}', $value, $this->endpoint);

        return $this;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    protected function fetchResponse(): mixed
    {
        return Http::get($this->endpoint)->json();
    }

    public function getResponse(): mixed
    {
        if (preg_match('/\{[a-zA-Z]+\}/', $this->endpoint)) {
            throw new Exception('Endpoint contains unresolved placeholders.');
        }

        return $this->fetchResponse();
    }

}
