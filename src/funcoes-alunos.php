<?php

require_once "conexao.php";

// funcão para inserir aluno de
// function verificarAluno(PDO $conexao) {
//     $sql = "SELECT
//         id,
//         nome,
//         primeiroNota,
//         segundoNota,
//         media,
//         situacao
//     FROM alunos
//     WHERE id = :id";
// }


// Inserir dado de Alunos
function inserirAluno(PDO $cenexao, int $id, string $nome, float $primeiraNota, float $segundaNota, float $media, string $situacao):void {
    $sql = "INSERT INTO alunos (id, nome, primeiraNota, segundaNota, media, situacao) VALUES (:id, :nome, :primeira_Nota, :segunda_Nota, :media, :situacao)";
    
    try {
        $consulta = $cenexao->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":nome", $nome);
        $consulta->bindParam(":primeira_Nota", $primeiraNota);
        $consulta->bindParam(":segunda_Nota", $segundaNota);
        $consulta->bindParam(":media", $media);
        $consulta->bindParam(":situacao", $situacao);
        
        $consulta->execute();

    } catch (PDOException $error) {
        die ("Erro: ".$error->getMessage());
    }
}
