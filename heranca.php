<?php

    abstract class Automovel{
        protected string $modelo;
        protected string $ano;
        protected string $cor;

        public function __construct(string $modelo, float $ano, string $cor)
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

    class CarroEsportivo extends Automovel {
        function Acelerar() {
            echo "{$this->modelo} acelerou rápido<br>";
        }
    }



    abstract class Animal{
        protected string $especie;
        protected string $cor;
        protected string $tamanho;

        public function __construct(string $especie, string $cor, float $tamanho)
        {
            $this->especie = $especie;
            $this->cor = $cor;
            $this->tamanho= $tamanho;
        }

        public function comer()
        {
            echo "{$this->especie} esta comendo<br>";
        }
    }

        class Cachorro extends Animal {
            public function Comer(){
                echo "{$this->especie} esta comendo<br>";
        }
    }



    abstract class Filme{
        protected string $titulo;
        protected string $ano;
        protected string $genero;

        public function __construct(string $titulo, float $ano, string $genero)
        {
            $this->titulo = $titulo;
            $this->ano = $ano;
            $this->genero = $genero;
        }

        public function lancar()
        {
            echo "O filme {$this->titulo} do genero {$this->genero} foi lançado em {$this->ano}<br>";
        }
    }

    class Aventura extends Filme {
        public function lancar() {
            echo "O filme {$this->titulo} do genero {$this->genero} foi lançado em {$this->ano}<br>";
        }
    }

    $ferrari = new CarroEsportivo("Ferrari", 2004, "Vermelho");
    $ferrari-> andar();

    echo "<br>";

    $mel = new Cachorro("Mel", "branco", 60);
    $mel->comer();

    echo "<br>";

    $moana = new Aventura("Moana", 2016, "aventura");
    $moana->lancar();

    
