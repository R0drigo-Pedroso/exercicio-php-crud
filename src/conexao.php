<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "crud_escola_rodrigo";


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
