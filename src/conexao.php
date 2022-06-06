<?php

    $servidor = "localhost";
    $usuario ="webmaio1_crud_er";
    $senha = "Er582700@22";
    $banco ="webmaio1_crud_escola_rodrigo";

    try{
        $conexao = new PDO(
            "mysql:host=$servidor;dbname=$banco; charset=utf8",

            $usuario,
            $senha
        );

        $conexao->setAttribute(
            PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        die ("Erro: ".$error->getMessage());
    }

    // $servidor = "localhost";
    // $usuario = "root";
    // $senha = "";
    // $banco = "crud_escola_rodrigo";