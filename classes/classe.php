<?php

    class Pessoa{
        public $nome;
        public $altura;
        public $peso;
        public $cpf;

        function __construct(string $nome, float $altura, float $peso, string $cpf)
        {
            $this->nome = $nome;
            $this->altura = $altura;
            $this->peso = $peso;
            $this->cpf = $cpf;
        }

        function andar()
        {
            echo "{$this->nome} ta andando\n";
        }
    }

    $joao = new Pessoa("João", 1.76, 70, "12345678900");

    $joao->andar();

    $japa = new Pessoa("Japa", 1.76, 65, "00000000011");

    $japa->andar();