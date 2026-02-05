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
            echo "Produto: {$this->nome}<br> Preço: {$this->preco}R$ <br> Estoque: {$this->quantidade}<br>";
        }

        public function getPreco(): float {
        return $this->preco;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function reduzirEstoque(int $estoque): void {
        if ($estoque <= $this->quantidade) {
            $this->quantidade -= $estoque;
        } else {
            throw new Exception("Estoque insuficiente para o produto: {$this->nome}");
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

    abstract public function getDesconto(): float;
    
    public function getNome(): string {
        return $this->nome;
    }
}

    class ClienteComum extends Cliente {
        public function getDesconto(): float {
        return 0.0;
    }

    function cm() {
            echo "Nome completo: {$this->nome}<br> Cpf: {$this->cpf}R$ <br> Email: {$this->email}<br>";
        }
}

    $joao = new ClienteComum ("Joao Silva", 364864, "joao@gmail.com");
    $joao-> cm();

     class ClientePremium extends Cliente {
        public function getDesconto(): float {
        return 0.20;
    }
        function cp() {
            echo "Nome completo: {$this->nome}<br> Cpf: {$this->cpf}R$ <br> Email: {$this->email}<br>";
        }
    }

    $maria = new ClientePremium ("Maria Souza", 9646456, "maria@gmail.com");
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
        if ($this->status !== "aberto") {
            echo "Não é possível adicionar produtos a um pedido finalizado.\n";
            return;
        }
        $this->compra [] = [
            'produto' => $produto,
            'quantidade' => $quantidade
        ];
        $this->total += ($produto->getPreco() * $quantidade);
        $produto->reduzirEstoque($quantidade);
    }

    public function finalizarPedido(): float {
        if ($this->status !== "aberto") {
            echo "Pedido já foi processado.\n";
            return $this->total;
        }

        $desconto = $this->cliente->getDesconto();
        $valorFinal = $this->total * (1 - $desconto);
        $this->status = "pago";
        
        return $valorFinal;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function exibirResumo(): void {
        echo "Cliente: " . $this->cliente->getNome() . " (" . get_class($this->cliente) . ")\n";
        echo "Status: " . $this->status . "\n";
        echo "Total: R$ " . number_format($this->total, 2, ',', '.') . "\n";
    }
}

echo "<br>--- Pedido 1 (Cliente Comum) ---\n<br>";
$pedido1 = new Pedido($joao);
$pedido1->adicionarProduto($camiseta, 1);
$pedido1->adicionarProduto($bone, 2);
$pedido1->exibirResumo();
echo "Total Final: R$ " . number_format($pedido1->finalizarPedido(), 2, ',', '.') . "\n\n";

echo "<br><br>--- Pedido 2 (Cliente Premium - 20% de desconto) ---\n<br>";
$pedido2 = new Pedido($maria);
$pedido2->adicionarProduto($camiseta, 1);
$pedido2->adicionarProduto($bone, 1);
$pedido2->exibirResumo();
echo "Total Final: R$ " . number_format($pedido2->finalizarPedido(), 2, ',', '.') . "\n";


