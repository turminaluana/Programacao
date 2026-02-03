<?php

    class Filme{
        public $titulo;
        public $ano;
        public $genero;

        function __construct(string $titulo, float $ano, string $genero)
        {
            $this->titulo = $titulo;
            $this->ano = $ano;
            $this->genero = $genero;
        }

        function lancar()
        {
            echo "O filme {$this->titulo} do genero {$this->genero} foi lançado em {$this->ano}<br>";
        }
    }

    $gentegrande = new Filme("Gente Grande", 2010, "comedia");

    $gentegrande->lancar();

    $moana = new Filme("Moana", 2016, "aventura");

    $moana->lancar();

    $aempregada = new Filme("A empregada", 2025, "misterio");

    $aempregada->lancar();