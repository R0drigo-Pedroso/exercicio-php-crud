<?php
    require_once '../exercicio-php-crud/src/funcoes-alunos.php';

    $visualizarAlunos = visualizarAlunos ($conexao)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <table border="1">
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
                        <a href="atualizar.php?id=<?=$visualizarAluno["id"]?>"> <!-- Criação de link dinamico  -->
                            Atualizar
                        </a>
                    </td>

                    <td>
                        <a class="excluir" href="excluir.php?id=<?=$visualizarAluno["id"]?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/confirmar.js"></script>

</body>
</html>