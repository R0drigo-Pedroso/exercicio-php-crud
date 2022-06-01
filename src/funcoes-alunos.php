<?php

require_once 'conexao.php';

// Função para inserir um aluno
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

    // Função visualizar Alunos
    function visualizarAlunos(PDO $conexao):array {
        $sql = "SELECT id, nome, primeiraNota, segundaNota, media, situacao FROM alunos";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->execute();

            $alunos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
            
        }catch (Exception $error) {
            die ("Erro na consulta ao banco de dados: " .$error -> getMessage());
        }
    }

    // Função para deletar aluno
    function deletarAluno(PDO $conexao, int $id):void {
        $sql = "DELETE FROM alunos WHERE id = :id";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch (Exception $error) {
            die ("Erro na consulta ao banco de dados: " .$error -> getMessage());
        }
    }


    // Função para editar aluno
    function lerUmAluno(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome, primeiraNota, segundaNota, media, situacao FROM produtos WHERE id = :id";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        } catch(Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }

        return $resultado;
    }