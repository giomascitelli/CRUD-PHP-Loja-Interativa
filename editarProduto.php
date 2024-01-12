<?php
// Header
include_once 'includes/header.php';

// Conexão
include_once 'php_action/db_connect.php';

// Mensagem
include_once 'includes/message.php';

if (isset($_GET['id'])) {
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM produtos WHERE id = '$id'";

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
	<h5 class="mb-5 mt-4">Editar Produto</h5>

	<form action="php_action/updateProduto.php" method="POST" class="row g-3">
		
		<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

	<div class="col-md-6">
		<div class="mb-3">
			<label for="nome" class="form-label">Nome do Produto</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
		</div>
	</div>

	<div class="col-md-3">
		<div class="mb-3">
			<label for="preco" class="form-label">Preço</label>
			<input type="number" class="form-control" id="preco" name="preco" value="<?php echo $dados['preco']; ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="mb-3">
		    <label for="categoriaID" class="form-label">Categoria</label>
		    <select class="form-control" id="categoriaID" name="categoriaID">
		        <?php
		        $sql = "SELECT * FROM categorias";
		        $resultado = mysqli_query($connect, $sql);
		        while ($categoria = mysqli_fetch_assoc($resultado)): ?>
		            <option value="<?php echo $categoria['id']; ?>" <?php echo $dados['categoriaID'] == $categoria['id'] ? 'selected' : ''; ?>>
		                <?php echo $categoria['nome']; ?>
		            </option>
		        <?php endwhile; ?>
		    </select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="mb-3">
			<label for="quantidade" class="form-label">Quantidade</label>
			<input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $dados['quantidade']; ?>">
		</div>
	</div>

	<div class="col-12">
		<button type="submit" id="btn-editar-produto" name="btn-editar-produto" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Salvar dados</button>
	</div>

	</form>
</div>
</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>