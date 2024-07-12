<?php

namespace App\Http\Controllers;

use App\Pokemon\PokemonRepository;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PokemonController extends Controller
{
    public function __construct(private PokemonRepository $repository)
    {

    }

    public function list(Request $request): Response
    {
        return Inertia::render('PokemonList', [
            'pokemonList' => $this->repository->getAll()
        ]);
    }

    public function index(Request $request, string $pokemon): Response
    {
        return Inertia::render('PokemonView', [
            'pokemon' => $this->repository->find($pokemon)
        ]);
    }
}
