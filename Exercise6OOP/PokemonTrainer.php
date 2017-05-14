<?php

class Trainer {

    private $name;
    private $numberOfBadges;
    private $collectionOfPokemons;

    public function __construct(string $name, int $numberOfBadges, int $collectionOfPokemons) {
        $this->name = $name;
        $this->numberOfBadges = $numberOfBadges;
        $this->collectionOfPokemons = $collectionOfPokemons;
    }

    public function getNumberOfBadges() {
        return $this->numberOfBadges;
    }

    public function __toString() {
        return $this->name . ' ' . $this->numberOfBadges . ' ' . $this->collectionOfPokemons . PHP_EOL;
    }

}

class Pockemon {

    private $trainerName;
    private $pokemonName;
    private $pokemonElement;
    private $pokemonHealth;

    public function __construct(string $trainerName, string $pokemonName, string $pokemonElement, int $pokemonHealth) {
        $this->trainerName = $trainerName;
        $this->pokemonName = $pokemonName;
        $this->pokemonElement = $pokemonElement;
        $this->pokemonHealth = $pokemonHealth;
    }

    public function isAlive() {
        return $this->pokemonHealth > 0;
    }

    public function reduceHealth(int $health = 10) {
        $this->pokemonHealth = $this->pokemonHealth - $health;
    }

    public function getTrainerName() {
        return $this->trainerName;
    }

    public function getPokemonName() {
        return $this->pokemonName;
    }

    public function getPokemonElement() {
        return $this->pokemonElement;
    }

    public function getPokemonHealth() {
        return $this->pokemonHealth;
    }

}

$stringPokemons = trim(fgets(STDIN));
$pokemons = [];//$collectionOfPokemons
$trainersRes = [];
while ($stringPokemons != 'Tournament') {
    $arrayPokemon = explode(' ', $stringPokemons);
    $trainerName = $arrayPokemon[0];
    $pokemonName = $arrayPokemon[1];
    $pokemonElement = $arrayPokemon[2];
    $pokemonHealth = $arrayPokemon[3];

    $trainersRes[$trainerName][] = $pokemonElement;

    $pokemon = new Pockemon($trainerName, $pokemonName, $pokemonElement, $pokemonHealth);
    $pokemons[] = $pokemon;

    $stringPokemons = trim(fgets(STDIN));
}

$stringElement = trim(fgets(STDIN));
$trainersBadges = [];
while ($stringElement != 'End') {

    if ($stringElement == 'Fire' || $stringElement == 'Water' || $stringElement == 'Electricity') {
        foreach ($trainersRes as $trainerName => $trainersResistances) {
            if (in_array($stringElement, $trainersResistances)) {
                if (isset($trainersBadges[$trainerName])) {
                    $trainersBadges[$trainerName] += 1;
                } else {
                    $trainersBadges[$trainerName] = 1;
                }
            } else {
                foreach ($pokemons as $pokemon) {
                    if ($pokemon->getTrainerName() == $trainerName) {
                        $pokemon->reduceHealth();
                        if (!$pokemon->isAlive()) {
                            if (($key = array_search($pokemon->getPokemonElement(), $trainersResistances)) !== false) {
                                unset($trainersRes[$trainerName][$key]);
                            }
                        }
                    }
                }
            }
        }
    }
    
    $stringElement = trim(fgets(STDIN));
}

$trainers = array();
foreach ($trainersRes as $trainerName => $pokemons) {
    $trainer = new Trainer($trainerName, (isset($trainersBadges[$trainerName])) ? $trainersBadges[$trainerName] : 0, count($pokemons));
    $trainers[] = $trainer;
}

usort($trainers, function(Trainer $a, Trainer $b) {
    return $a->getNumberOfBadges() < $b->getNumberOfBadges();
});

foreach ($trainers as $trainer) {
    echo $trainer;
}