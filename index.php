<?php
include("functions.php"); // Inclui functions.php para uso de suas funções

if (isset($_GET['type'])) { // Se houver o método GET['type'] executa ação
	if ($_GET['type'] == 0) { // Se o método GET['type'] for = 0 executa ação
		$opt1 = 'selected=""'; // Define variável para uso no seletor de opções (Criptografar / Descriptografar)
		$opt2 = null; // Define variável para uso no seletor de opções (Criptografar / Descriptografar)
	} else { // Caso não possua valor 0, executa esta outra ação
		$opt2 = 'selected=""'; // Define variável para uso no seletor de opções (Criptografar / Descriptografar)
		$opt1 = null; // Define variável para uso no seletor de opções (Criptografar / Descriptografar)
	}
} else { // Caso o método GET['type'] não exista, define as variáveis como Null (Falso / 0)
	$opt1 = null;
	$opt2 = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cifra de César</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="conteudo">
		<h1><small>Criptografia com</small> Cifra de César <span class="mini">v 1.0</span></h1>
		<form target="" method="GET"> <!-- Início do Formulário (Método GET é excelente para este tipo de formulário) -->
			<input type="number" name="d" class="number" placeholder="Deslocamento" value="<?php echo $_GET['d']; ?>" min="-26" max="26"><br><br> <!-- Define seletor de deslocamento -->
			<textarea id="input" name="c" placeholder="Texto para ser processado" class="criptografia" cols="64"><?php if(isset($_GET['c'])) { echo $_GET['c']; } ?></textarea> <!-- Campo de texto que será processado -->
			<br><br>
			<div class="text-cript">
				<strong>Resultado:</strong>
				<?php 
					if (isset($_GET['c'])) { // Se o campo de texto estiver com conteúdo, executa ação abaixo

						$cript = $_GET['c']; // Define variável $cript como o valor C do get (Campo de texto a ser criptografado)

						if ($_GET['d'] != '') { // Se o campo de deslocamento for diferente de "" ou null executa ação
							$desl = $_GET['d']; // Define variável $desl que será usada para o deslocamento
						} else {
							$desl = 0; // Define que o deslocamento será 0
						}

						if ($_GET['type'] == 0) { // Define se irá Criptografar ou Descriptografar de acordo com o 
							criptografia($cript, $desl); // Chama função de criptografia presente em functions.php
						} else {
							descriptografia($cript, $desl); // Chama função de descriptografia presente em functions.php
						}

					} else {
						echo "..."; // Caso o campo de texto estiver vazio, exibe os 3 pontinhos
					}
				?>
			</div>
			<br><br>
			<select class="cripting" name="type"> <!-- Seletor onde serão utilizadas as variáveis $opt1 e $opt2 -->
				<option value="0" <?php echo $opt1; ?>>Criptografar</option>
				<option value="1" <?php echo $opt2; ?>>Descriptografar</option>
			</select>
			<br><br>
			<button type="submit" class="botao">Executar</button> <button type="button" onClick="limpa()" class="botao">Limpar</button> <!-- Envia o formulário ou Limpa ele com uma simples função em Javascript -->
		</form>
		<br><br>
		<hr>
		<div class="content">
			Criptografia utilizando o método "<strong>Cifra de César</strong>" programado em PHP e desenvolvido por <strong>Paulo Henrique</strong>.
			<br><br>
			<strong>Atenção:</strong> Processa somente letras com ou sem acentos
			<br><br>
			<strong>F</strong>aculdade <strong>d</strong>e <strong>A</strong>mericana - Ciência da Computação - 2014
		</div>
	</div>
	<script type="text/javascript"> // Script simples para limpeza dos campos
		function limpa() { // Função em javascript para limpeza
			if(document.getElementById('input').value!="") { // Se o campo de texto não estiver vazio
				document.getElementById('input').value=""; // Define o valor como vazio ""
			}
		}
	</script>
</body>
</html>