<?php
// Sessão
session_start();

// Conexão
include_once 'db_connect.php';

// Função anti-SQL Injection e XSS
function clear($input) {
	global $connect;

	$var = mysqli_escape_string($connect, $input);

	$var = htmlspecialchars($var);
	return $var;
}

if (isset($_POST['btn-cadastrar-categoria'])) {
	$nome = clear($_POST['nome']);

	$sql = "INSERT INTO categorias (nome) VALUES ('$nome')";

	if (mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Categoria cadastrada com sucesso!";
		$_SESSION['tipo_mensagem'] = "success";
		header('Location: ../index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao cadastrar categoria.";
		$_SESSION['tipo_mensagem'] = "warning";
		header('Location: ../index.php');
	}
}