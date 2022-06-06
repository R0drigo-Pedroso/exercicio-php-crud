<?php
    require_once 'src/funcoes-alunos.php';

    $visualizarAlunos = visualizarAlunos ($conexao)
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
        
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a class="btn btn-primary" href="inserir.php"><i class="bi bi-plus-circle"> </i>Inserir novo aluno</a></p>

    <table class="border border-5 rounded-5 table table-primary table-hover text-center  shadow-lg p-3 mb-5 bg-body rounded">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Primeira nota</th>
                <th>Segunda Nota</th>
                <th>Media</th>
                <th>Situação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visualizarAlunos as $visualizarAluno){ ?>
                 <tr>
                    <td><?=$visualizarAluno["nome"]?></td>           
                    <td><?=$visualizarAluno["primeiraNota"]?></td>
                    <td><?=$visualizarAluno["segundaNota"]?></td>           
                    <td><?=$visualizarAluno["media"]?></td>
                    <td><?=$visualizarAluno["situacao"]?></td>

                    <!-- botões para atualizar e excluir -->
                    <td>
                        <a class="btn btn-primary" href="atualizar.php?id=<?=$visualizarAluno["id"]?>"> <!-- Criação de link dinamico  -->
                            <i class="bi bi-arrow-repeat"> </i>Atualizar
                        </a>
                    </td>

                    <td>
                        <a class="excluir btn btn-danger" href="excluir.php?id=<?=$visualizarAluno["id"]?>">
                            <i class="bi bi-trash3"> </i>Excluir
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a class="btn btn-success" href="index.php"><i class="bi bi-arrow-left-circle"></i> Voltar ao início</a></p>
</div>

<script src="js/confirmar.js"></script>

</body>
</html>