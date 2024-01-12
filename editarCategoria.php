<?php
// Header
include_once 'includes/header.php';

// Conexão
include_once 'php_action/db_connect.php';

// Mensagem
include_once 'includes/message.php';

if (isset($_GET['id'])) {
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM categorias WHERE id = '$id'";

	$resultado = mysqli_query($connect, $sql);

	$dados = mysqli_fetch_array($resultado);
}
?>

<div class="container-fluid">
    <div class="row">
        <!-- Navbar -->
        <nav class="navbar" data-bs-theme="dark" style="height: 100px; background-color: #AC8FEB;">
            <div class="container-fluid">
                <a class="navbar-brand">Gestão de mudanças</a>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="bg-light border-right vh-100" style="width: 13%;">
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action bg-light text-truncate" style="height: 60px; display: flex; align-items: center;"><i class="bi bi-columns-gap"></i>Categorias</a>
                <a href="produtos.php" class="list-group-item list-group-item-action bg-light text-truncate" style="height: 60px; display: flex; align-items: center;"><i class="bi bi-file-earmark-plus"></i>Produtos</a>
            </div>
        </div>
   <div class="col-md-10">
	<a href="produtos.php" class="btn btn-outline-primary" style="height: 60px; width: 100px; display: flex; align-items: center; justify-content: center; border-radius: 0; margin-left: -10px; color: gray; border-color: gray; background-color: white;"><i class="bi bi-caret-left-fill"></i>Voltar</a>

	<hr style="margin-top: 0px; margin-left: -10px;">
	<h5 class="mb-5 mt-4">Editar Categoria</h5>

	<form action="php_action/updateCategoria.php" method="POST">
		
		<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

	<div class="col-md-6">
		<div class="mb-6">
			<label for="nome" class="form-label">Nome da Categoria</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
		</div>
	</div>

<div class="row">
	<div class="col-md-6">
		<div class="mb-3">
			<label for="id" class="form-label">ID</label>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $dados['id']; ?>" disabled>
		</div>
	</div>

	<div class="col-md-6">
		<div class="mb-3">
			<label for="dataCriacao" class="form-label">Data de Criação</label>
			<input type="date" class="form-control" id="dataCriacao" name="dataCriacao" value="<?php echo date('Y-m-d'); ?>" disabled>
		</div>
	</div>
	</div>

	<div class="col-12">
		<button type="submit" id="btn-editar-categoria" name="btn-editar-categoria" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Salvar dados</button>
	</div>
	</form>
</div>
</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>