<?php

namespace App\Pokemon;

class PokemonDTO
{
    public function __construct(
        public array $abilities,
        public int $baseExperience,
        public array $cries,
        public array $forms,
        public array $gameIndices,
        public int $height,
        public array $heldItems,
        public int $id,
        public bool $isDefault,
        public string $locationAreaEncounters,
        public array $moves,
        public string $name,
        public int $order,
        public array $pastAbilities,
        public array $pastTypes,
        public array $species,
        public array $sprites,
        public array $stats,
        public array $types,
        public int $weight
    ) {

    }

    public static function fromResponse(?array $response = null): PokemonDTO
    {
        return new self(
            $response['abilities'] ?? [],
            $response['base_experience'] ?? 0,
            $response['cries'] ?? [],
            $response['forms'] ?? [],
            $response['game_indices'] ?? [],
            $response['height'] ?? 0,
            $response['held_items'] ?? [],
            $response['id'] ?? 0,
            $response['is_default'] ?? false,
            $response['location_area_encounters'] ?? '',
            $response['moves'] ?? [],
            $response['name'] ?? '',
            $response['order'] ?? 0,
            $response['past_abilities'] ?? [],
            $response['past_types'] ?? [],
            $response['species'] ?? [],
            $response['sprites'] ?? [],
            $response['stats'] ?? [],
            $response['types'] ?? [],
            $response['weight'] ?? 0
        );
    }

}
