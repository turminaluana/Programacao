<?php

include("connection.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nascimento'];
$senha = $_POST['senha'];


$sql = "INSERT INTO usuario (nome, email, data_nascimento, cpf, senha)
VALUES ('$nome', '$email', '$data_nasc', '$cpf', '$senha')";

if($conn->query($sql) === TRUE){
    echo "Usuario cadastrado com sucesso!";
}

else{
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
