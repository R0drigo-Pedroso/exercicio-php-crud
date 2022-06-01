<?php

require_once 'conexao.php';

    function cadastraAluno (PDO $conexao, string $nome, float $primeiraNota, float $segundaNota, float $media, string $situacao) {
        $sql ="INSERT INTO alunos (nome, primeiraNota, segundaNota, media, situacao) VALUES (:nome, :primeiraNota, :segundaNota, :media, :situacao)";
    
        try {
            $consulta = $conexao->prepare($sql);

            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':primeiraNota', $primeiraNota, PDO::PARAM_STR);
            $consulta->bindParam(':segundaNota', $segundaNota, PDO::PARAM_STR);
            $consulta->bindParam(':media', $media, PDO::PARAM_STR);
            $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);

            $consulta->execute();
        }catch (Exception $error) {
            echo $error->getMessage();
        }
    }