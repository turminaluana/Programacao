<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atividade</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
<form action="processa.php" method="POST">
    <div class="container flex ">
        <div class="tela flex">
            <div class="lado1 flex">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYyD5nq7v2IrAMwawCQSwEaH6OHAwqkQO5-w&s" alt="" class="imagem">
            </div>
            <div class="lado2 flex">
                <h1 class="margem">Cadastre-se</h1>
                <input type="text" placeholder="Nome" class="botao" name="nome">
                <input type="text" placeholder="Email" class="botao" name="email">
                <input type="text" placeholder="CPF" class="botao" name="cpf">
                <input type="date" placeholder="Data de Nascimento" class="botao" name="data_nascimento">
                <input type="password" placeholder="Senha" class="botao" name="senha">
                <input type="submit" value = "Cadastrar" class="botaoo">
                </form>

            </div>
        </div>
    </div>
</body>

</html>