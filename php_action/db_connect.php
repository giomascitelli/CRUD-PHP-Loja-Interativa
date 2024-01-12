<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "lojainterativa";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8mb4");

if (mysqli_connect_error()) {
	echo "Erro na conexão: ".mysqli_connect_error();
}