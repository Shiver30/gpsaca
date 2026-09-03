<?php
require_once "../conexao.php";

function login($conexao, $email, $senha){
    $sql = "SELECT * FROM equipe WHERE equipe_email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $equipe = $resultado->fetch_assoc();
        if (password_verify($senha, $equipe['equipe_senha'])) {
            $_SESSION['equipe_id'] = $equipe['equipe_id'];
            $_SESSION['equipe_nome'] = $equipe['equipe_nome'];
            $_SESSION['equipe_tipo'] = $equipe['equipe_tipo'];
            return true;
        }
    }
    return false;
}

// vereficar login

function verificarLogin(){
    // return isset($_SESSION['usuario']);
    if (!isset($_SESSION['equipe_id'])) {
        header("Location: ../login.php");
    exit;
    }
}

// Logout

function logout()
{
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}


/*
equipe_categoria:
1 = Coordenador
2 = Pesquisador Associado
3 = Mestrando
4 = Estudante Bolsista
5 = Egresso

equipe_tipo:
1 = Administrador
2 = Editor
3 = Apenas integrante
*/

function inserirEquipe($conexao, $nome, $email, $senha, $formacao, $area_atuacao, $lattes, $orcid, $researchgate, $publons, $googleAcademic, $cidade, $categoria, $tipo)
{
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO equipe (equipe_nome, equipe_email, equipe_senha, equipe_formacao, equipe_area_atuacao, equipe_lattes, equipe_orcid, equipe_researchgate, equipe_publons, equipe_google_academico, equipe_cidade, equipe_categoria, equipe_tipo)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, "ssssssssssii", $nome, $email, $senha, $formacao, $area_atuacao, $lattes, $orcid, $researchgate, $publons, $googleAcademic, $cidade, $categoria, $tipo);
    if (mysqli_stmt_execute($comando)) {
        mysqli_stmt_close($comando);
        return true;
    }
    mysqli_stmt_close($comando);
    return false;
}

function listarEquipe($conexao){
    $sql = "SELECT * FROM equipe ORDER BY equipe_nome ASC";
    return $conexao->query($sql);

}

function buscarEquipePorNome($conexao, $nome){
    $sql = "SELECT * FROM equipe WHERE equipe_nome LIKE ?";
    $stmt = $conexao->prepare($sql);
    $nomeBusca = "%".$nome."%";
    $stmt->bind_param("s", $nomeBusca);
    $stmt->execute();
    return $stmt->get_result();
}

function atualizarEquipe($conexao, $id, $nome, $email, $formacao, $area_atuacao, $lattes, $orcid, $researchgate, $publons, $googleAcademic, $cidade, $categoria, $tipo){
    $sql = "UPDATE equipe SET equipe_nome = ?, equipe_email = ?, equipe_formacao = ?, equipe_area_atuacao = ?, equipe_lattes = ?, equipe_orcid = ?, equipe_researchgate = ?, equipe_publons = ?, equipe_google_academico = ?, equipe_cidade = ?, equipe_categoria = ?, equipe_tipo = ? WHERE equipe_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssssssiii", $nome, $email, $formacao, $area_atuacao, $lattes, $orcid, $researchgate, $publons, $googleAcademic, $cidade, $categoria, $tipo, $id);
    return $stmt->execute();
}

function atualizarSenhaEquipe($conexao, $id, $senha)
{
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE equipe SET equipe_senha = ? WHERE equipe_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("si", $senha, $id);
    return $stmt->execute();
}

/*

-----------------------------------------------------------
1. TABELA: EQUIPE
-----------------------------------------------------------

Cadastrar integrante            OK
Consultar/Listar integrantes    Testar
Consultar integrante por ID     Testar
Editar integrante               Testar

*/
    

/*
-----------------------------------------------------------
2. TABELA: PUBLICACOES
-----------------------------------------------------------

Cadastrar publicação
Consultar/Listar publicações
Consultar publicação por ID
Editar publicação
Excluir publicação

*/


/*
-----------------------------------------------------------
3. TABELA: PROJETOS
-----------------------------------------------------------

Cadastrar projeto
Consultar/Listar projetos
Consultar projeto por ID
Editar projeto
Excluir projeto

*/


/*
-----------------------------------------------------------
4. TABELA: PROJETOS_IMAGENS
-----------------------------------------------------------

Cadastrar imagem vinculada a um projeto
Consultar/Listar imagens de um projeto
Consultar imagem por ID
Editar informações da imagem
Excluir imagem

IMPORTANTE:
- Toda imagem deve estar vinculada a um projeto existente.
- projetos_imagens_projeto_id é uma chave estrangeira
  para projetos.projetos_id.
- Ao excluir um projeto, suas imagens são excluídas
  automaticamente pelo ON DELETE CASCADE.

*/


/*
-----------------------------------------------------------
5. TABELA: MATERIAIS
-----------------------------------------------------------

Cadastrar material
Consultar/Listar materiais
Consultar material por ID
Editar material
Excluir material

*/


/*
-----------------------------------------------------------
6. TABELA: ATAS
-----------------------------------------------------------

Cadastrar ata
Consultar/Listar atas
Consultar ata por ID
Editar ata
Excluir ata

*/


/*
===========================================================
                  FIM DOS CRUDs
===========================================================
*/




?>