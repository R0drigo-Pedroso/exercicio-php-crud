<?php
	require_once '../exercicio-php-crud/src/funcoes-alunos.php';

	if(isset ($_POST['inserir'])){
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
		$primeiraNota = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$segundaNota = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$media = filter_input(INPUT_POST, 'media', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_SPECIAL_CHARS);

		$media = ($primeiraNota + $segundaNota) / 2;

		if($media >= 7){
			$resultado = 'Aprovado';
		}else{
			$resultado = 'Reprovado';
		}

		$situacao = $resultado;

		cadastraAluno($conexao, $nome, $primeiraNota, $segundaNota, $media, $situacao);

		header('Location: visualizar.php');

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
		
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

	</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	
		<form action="#" method="post">
			<p>
				<label for="nome">Nome:</label>
				<input type="text" name="nome" id="nome" required>
			</p>
			
			<p>
				<label for="primeira">Primeira nota:</label>
				<input type="number" name="primeira" id="primeira" step="0.1" min="0.0" max="10" required>
			</p>
			
			<p>
				<label for="segunda">Segunda nota:</label>
				<input type="number" name="segunda"  id="segunda" step="0.1" min="0.0" max="10" required>
			</p>
	
			<button class="btn btn-primary"type="submit" name="inserir"><i class="bi bi-clipboard2-check me-2"></i>Cadastrar aluno</button>
		
	</form>

	
    <hr>
    <p><a class="btn btn-success" href="index.php"><i class="bi bi-arrow-left-circle me-2"></i> Voltar ao início</a></p>
</div>

</body>
</html>