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

if (isset($_POST['btn-editar-categoria'])) {
	$id = clear($_POST['id']);
	$nome = clear($_POST['nome']);

	$sql = "UPDATE categorias SET nome = '$nome' WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Categoria editada com sucesso!";
		$_SESSION['tipo_mensagem'] = "success";
		header('Location: ../index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao editar categoria.";
		$_SESSION['tipo_mensagem'] = "warning";
		header('Location: ../index.php');
	}
}