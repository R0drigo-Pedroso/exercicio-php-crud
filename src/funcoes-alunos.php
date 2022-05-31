<?php

require_once "conexao.php";

// Inserir dado de Alunos
function inserirAluno(PDO $cenexao, string $nome, float $primeiraNota, float $segundaNota, float $media, string $situacao):void {
    $sql = "INSERT INTO alunos (nome, primeiraNota, segundaNota, media, situacao) VALUES (:nome, :primeira_Nota, :segunda_Nota, :media, :situacao)";
    
    try {
        $consulta = $cenexao->prepare($sql);

        // $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->bindParam(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindParam(":primeira_Nota", $primeiraNota, PDO::PARAM_STR);
        $consulta->bindParam(":segunda_Nota", $segundaNota, PDO::PARAM_STR);
        $consulta->bindParam(":media", $media, PDO::PARAM_STR);
        $consulta->bindParam(":situacao", $situacao, PDO::PARAM_STR);
        
        $consulta->execute();

    } catch (Exception $error) {
        die ("Erro: ".$error->getMessage());
    }
}

function lerAlunos(PDO $cenexao):array {
    $sql = "SELECT * FROM alunos";

    try {
        $consulta = $cenexao->prepare($sql);
        $consulta->execute();

        $alunos = [];

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $alunos[] = $linha;
        }

        return $alunos;
    } catch (Exception $error) {
        die ("Erro: ".$error->getMessage());
    }
}