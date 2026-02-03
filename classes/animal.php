<?php

    class Animal{
        public $especie;
        public $cor;
        public $tamanho;

        function __construct(string $especie, string $cor, float $tamanho)
        {
            $this->especie = $especie;
            $this->cor = $cor;
            $this->tamanho= $tamanho;
        }

        function comer()
        {
            echo "{$this->especie} esta comendo<br>";
        }
    }

    $cachorro = new Animal("Cachorro", "branco", 60);

    $cachorro->comer();

    $hiena = new Animal("Hiena", "marrom", 1,00);

    $hiena->comer();

    $tartaruga = new Animal("Tartaruga", "verde", 30);

    $tartaruga->comer();