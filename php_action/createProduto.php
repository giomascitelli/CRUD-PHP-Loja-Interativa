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

if (isset($_POST['btn-cadastrar-produto'])) {
	$nome = clear($_POST['nome']);
	$preco = clear($_POST['preco']);
	$quantidade = clear($_POST['quantidade']);
	$categoriaID = clear($_POST['categoriaID']);

	$sql = "INSERT INTO produtos (nome, preco, quantidade, categoriaID) VALUES ('$nome', '$preco', '$quantidade', '$categoriaID')";

	if (mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
		$_SESSION['tipo_mensagem'] = "success";
		header('Location: ../produtos.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao cadastrar produto.";
		$_SESSION['tipo_mensagem'] = "warning";
		header('Location: ../produtos.php');
	}
}