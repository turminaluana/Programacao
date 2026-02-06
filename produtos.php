<?php

class Produto{
        public $nome;
        public $preco;
        public $quantidade;

        public function __construct(string $nome, float $preco, float $quantidade)
        {
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
        }

        public function pr()
        {
            echo "Produto: {$this->nome}<br> Preço: {$this->preco}R$ <br> Estoque: {$this->quantidade}<br><br>";
        }

        public function getNome() {
        return $this->nome;
    }

        public function getPreco() {
        return $this->preco;
    }

        public function diminuirEstoque(int $estoque): void {
            if ($estoque <= $this->quantidade) {
            $this->quantidade -= $estoque;
           } else {
            throw new Exception("Estoque insuficiente pro produto: {$this->nome}");
        }
    }

    }

    $camiseta = new Produto ("Camiseta", 58.99, 300);
    $camiseta-> pr();

    $bone = new Produto ("Bone", 32.50, 127);
    $bone-> pr();
    
    abstract class Cliente{
        protected string $nome;
        protected string $cpf;
        protected string $email;

        public function __construct(string $nome, float $cpf, string $email)
        {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
        }

    abstract public function getDesconto();
    
    public function getNome() {
        return $this->nome;
    }
}

    class ClienteComum extends Cliente {
        public function getDesconto() {
        return 0.0;
    }

    function cm() {
            echo "Nome: {$this->nome}<br> Cpf: {$this->cpf}R$ <br> Email: {$this->email}<br><br>";
        }
}

    $joao = new ClienteComum ("Joao Silva", 364864, "joao@gmail.com");
    $joao-> cm();

     class ClientePremium extends Cliente {
        public function getDesconto() {
        return 0.20;
    }
        function cp() {
            echo "Nome: {$this->nome}<br> Cpf: {$this->cpf}R$ <br> Email: {$this->email}<br>";
        }
    }

    $maria = new ClientePremium ("Maria Silva", 9646456, "maria@gmail.com");
    $maria-> cp();


    class Pedido {
    private Cliente $cliente;
    private array $compra = [];
    private string $status;
    private float $total = 0;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
        $this->status = "aberto";
    }

    public function adicionarProduto(Produto $produto, int $quantidade): void {
       
        $this->compra [] = [
            'produto' => $produto,
            'quantidade' => $quantidade
        ];

        $this->total += ($produto->getPreco() * $quantidade);
        $produto->diminuirEstoque($quantidade);
    }

    public function finalizarPedido() {
        if ($this->status !== "aberto") {
            echo "Pedido já foi processado.";
            return $this->total;
        }

        $desconto = $this->cliente->getDesconto();
        $valorFinal = $this->total * (1 - $desconto);
        $this->status = "pago";
        
        return $valorFinal;
    }

    public function getStatus() {
        return $this->status;
    }

    
    public function exibirResumo(): void {
        echo "Cliente {$this->cliente->getNome()}<br>";
        echo "Status: {$this->status} <br>";
        echo "Total: R$ " . number_format($this->total, 2);
    }
}

echo "<br>Pedido 1 (Cliente Comum)<br>";
$pedido1 = new Pedido($joao);
$pedido1->adicionarProduto($camiseta, 1);
$pedido1->adicionarProduto($bone, 2);
$pedido1->exibirResumo();
echo "<br>Total Final: R$ " . number_format($pedido1->finalizarPedido(), 2);

echo "<br><br>Pedido 2 (Cliente Premium - 20% de desconto)<br>";
$pedido2 = new Pedido($maria);
$pedido2->adicionarProduto($camiseta, 1);
$pedido2->adicionarProduto($bone, 1);
$pedido2->exibirResumo();
echo "<br>Total com desconto: R$ " . number_format($pedido2->finalizarPedido(), 2);


