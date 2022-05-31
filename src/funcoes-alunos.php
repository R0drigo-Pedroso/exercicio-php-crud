<?php

require_once "conexao.php";

// Inserir dado de Alunos
function inserirAluno(PDO $conexao, int $id, string $nome, float $primeiraNota, float $segundaNota, float $media, string $situacao):void {
    $sql = "INSERT INTO alunos (id, nome, primeiraNota, segundaNota, media, situacao) VALUES (:id, :nome, :primeiraNota, :segundaNota, :media, :situacao)";
    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->bindParam(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindParam(":primeiraNota", $primeiraNota, PDO::PARAM_STR);
        $consulta->bindParam(":segundaNota", $segundaNota, PDO::PARAM_STR);
        $consulta->bindParam(":media", $media, PDO::PARAM_STR);
        $consulta->bindParam(":situacao", $situacao, PDO::PARAM_STR);
        
        $consulta->execute();

    } catch (PDOException $error) {
        die ("Erro: ".$error->getMessage());
    }
}
