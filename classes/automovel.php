<?php

    class Automovel{
        public $modelo;
        public $ano;
        public $cor;

        function __construct(string $modelo, float $ano, string $cor)
        {
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->cor = $cor;
        }

        function andar()
        {
            echo "{$this->modelo} de {$this->ano} esta andando rapido<br>";
        }
    }

    $carro = new Automovel("Carro", 1998, "branco");

    $carro->andar();

    $moto = new Automovel("Moto", 2008, "verde");

    $moto->andar();

    $onibus = new Automovel("Onibus", 2013, "amarelo");

    $onibus->andar();