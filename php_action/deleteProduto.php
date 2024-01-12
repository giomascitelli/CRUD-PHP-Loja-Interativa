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

if (isset($_POST['btn-deletar-produto'])) {
	$id = clear($_POST['id']);

	$sql = "DELETE FROM produtos WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Produto deletado com sucesso!";
		$_SESSION['tipo_mensagem'] = "success";
		header('Location: ../produtos.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao deletar produto.";
		$_SESSION['tipo_mensagem'] = "warning";
		header('Location: ../produtos.php');
	}
}