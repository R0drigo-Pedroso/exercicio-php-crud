<?php
    require_once 'src/funcoes-alunos.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $listarAluno = lerUmAluno($conexao, $id);

    if(isset($_POST['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $primeiraNota = filter_input(INPUT_POST, 'primeiraNota', FILTER_VALIDATE_FLOAT);
        $segundaNota = filter_input(INPUT_POST, 'segundaNota', FILTER_VALIDATE_FLOAT);
        // $media = filter_input(INPUT_POST, 'media', FILTER_VALIDATE_FLOAT);
        // $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_SPECIAL_CHARS);

        $media = ($primeiraNota + $segundaNota) / 2;

		if($media >= 7){
			$resultado = 'Aprovado';
		}else{
			$resultado = 'Reprovado';
		}

		$situacao = $resultado;

        atualizarAluno($conexao, $id, $nome, $primeiraNota, $segundaNota, $media, $situacao);

        header('Location:visualizar.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br" ng-app>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input value="<?=$listarAluno['nome']?>" type="text" name="nome" id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input value="<?=$listarAluno['primeiraNota']?>" name="primeiraNota" type="number" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input value="<?=$listarAluno['segundaNota']?>" name="segundaNota" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input value="<?=$listarAluno['media']?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input value="<?=$listarAluno['situacao']?>" type="text" ng-model="situação" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button class="btn btn-primary" name="atualizar"><i class="bi bi-clipboard2-check me-2"></i>Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a class="btn btn-success" href="visualizar.php"><i class="bi bi-arrow-left-circle me-2"></i>Voltar à lista de alunos</a></p>

</div>


    <script src="js/angular.min.js"></script>
</body>
</html>