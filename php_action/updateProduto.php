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

if (isset($_POST['btn-editar-produto'])) {
	$id = clear($_POST['id']);
	$nome = clear($_POST['nome']);
	$preco = clear($_POST['preco']);
	$quantidade = clear($_POST['quantidade']);
	$categoriaID = clear($_POST['categoriaID']);

	$sql = "UPDATE produtos SET nome = '$nome', preco = '$preco', quantidade = '$quantidade', categoriaID = '$categoriaID' WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Produto editado com sucesso!";
		$_SESSION['tipo_mensagem'] = "success";
		header('Location: ../produtos.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao editar produto.";
		$_SESSION['tipo_mensagem'] = "warning";
		header('Location: ../produtos.php');
	}
}