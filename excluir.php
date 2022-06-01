<?php 

    require_once '../exercicio-php-crud/src/funcoes-alunos.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    deletarAluno($conexao, $id);

    header('Location:visualizar.php');