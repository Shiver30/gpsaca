<?php
session_start();
require_once "../conexao.php";
require_once "../funcoes/funcoes.php";

if(isset($_POST['enviar'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $formacao = $_POST['formacao'] ?? '';
    $area_atuacao = $_POST['area_atuacao'] ?? '';
    $lattes = $_POST['lattes'] ?? '';
    $orcid = $_POST['orcid'] ?? '';
    $researchgate = $_POST['researchgate'] ?? '';
    $publons = $_POST['publons'] ?? '';
    $googleAcademic = $_POST['google_academico'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    if(inserirEquipe($conexao, $nome, $email, $senha, $formacao, $area_atuacao, $lattes, $orcid, $researchgate, $publons, $googleAcademic, $cidade, $categoria, $tipo)) {
        echo "<p>Integrante cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar integrante.</p>";
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
    
    <h1>Cadastro de Equipe</h1>
    <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite o email" required>
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite a senha" required>
        </p>
        <p>
            <label for="formacao">Formação:</label>
            <input type="text" name="formacao" id="formacao" placeholder="Digite a formação" required>
        </p>
        <p>
            <label for="area_atuacao">Área de Atuação:</label>
            <input type="text" name="area_atuacao" id="area_atuacao" placeholder="Digite a área de atuação">
        </p>
        <p>
            <label for="lattes">Lattes:</label>
            <input type="text" name="lattes" id="lattes" placeholder="Digite o link do Lattes">
        </p>
        <p>
            <label for="orcid">ORCID:</label>
            <input type="text" name="orcid" id="orcid" placeholder="Digite o ORCID">
        </p>
        <p>
            <label for="researchgate">ResearchGate:</label>
            <input type="text" name="researchgate" id="researchgate" placeholder="Digite o link do ResearchGate">
        </p>
        <p>
            <label for="publons">Publons:</label>
            <input type="text" name="publons" id="publons" placeholder="Digite o link do Publons">
        </p>
        <p>
            <label for="google_academico">Google Acadêmico:</label>
            <input type="text" name="google_academico" id="google_academico" placeholder="Digite o link do Google Acadêmico">
        </p>
        <p>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade" required>
        </p>
        <p>
            <label for="categoria">Cargo:</label>
            <select name="categoria" id="categoria" required>
                <option value="1">Coordenador</option>
                <option value="2">Pesquisador Associado</option>
                <option value="3">Mestrando</option>
                <option value="4">Estudante Bolsista</option>
                <option value="5">Egresso</option>
            </select>
        </p>
        <p>
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="1">Administrador</option>
                <option value="2">Editor</option>
                <option value="3">Apenas integrante</option>
            </select>
        </p>
        <button type="submit" name="enviar">Cadastrar</button>
        <br><br>
        <a href="../index.php">Voltar</a>
    </form>
