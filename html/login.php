<?php
session_start();

require_once "conexao.php";
require_once "funcoes/funcoes.php";

if (isset($_POST['enviar'])) {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sucesso = login($conexao, $email, $senha);

    if ($sucesso) {
        header("Location: ../home/home.php");
        exit;
    } else {
        $mensagem = "Erro no login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">

        <!-- EMAIL -->
        <div class="campo">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
        </div>


        <!-- SENHA -->
        <div class="campo">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>


        <!-- BOTÕES -->
        <div class="botoes">
            <a href="../index.php" class="btn btn-voltar">Voltar</a>
            <button type="submit" name="enviar" class="btn btn-entrar">
                Entrar
            </button>
        </div>
    </form>

</body>

</html>