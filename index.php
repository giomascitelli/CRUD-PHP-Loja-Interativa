<?php
// Header
include_once 'includes/header.php';

// Conexão
include_once 'php_action/db_connect.php';

// Mensagem
include_once 'includes/message.php';
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

    <div class="col-md-10 ml-3 mx-auto">
		<table class="table mt-4">

			<div class="d-flex justify-content-between align-items-center mt-5">
				<h5>Categorias</h5>
				<a href="adicionarCategoria.php" class="btn btn-primary" style="color: black; background-color: white; border-color: black;"><i class="bi bi-plus-circle"></i> Criar nova categoria</a>
			</div>

			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Data de Criação</th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM categorias";

				$resultado = mysqli_query($connect, $sql);

				if (mysqli_num_rows($resultado) > 0) {
					while ($dados = mysqli_fetch_array($resultado)) {

				?>

				<tr>
					<td><?php echo $dados['id'] ?></td>

					<td><?php echo $dados['nome'] ?></td>

					<td><?php echo date('d/m/Y', strtotime($dados['dataCriacao'])) ?></td>

					<td><a href="editarCategoria.php?id=<?php echo $dados['id']; ?>" class="btn btn-primary" style="margin-right: -50px;"><i class="bi bi-pen"></i></a></td>

					<td><a href="#modal<?php echo $dados['id']; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dados['id']; ?>"><i class="bi bi-trash"></i></a></td>

					<!-- Modal -->
					<div class="modal fade" id="modal<?php echo $dados['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h1 class="modal-title fs-5" id="modalLabel">Excluir categoria?</h1>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        Tem certeza que deseja excluir essa categoria?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

					        <form action="php_action/deleteCategoria.php" method="POST">
					        	<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
					        	<button type="submit" class="btn btn-danger" id="btn-deletar-categoria" name="btn-deletar-categoria">Excluir</button>
					        </form>

					      </div>
					    </div>
					  </div>
					</div>

				</tr>

				<?php
				} } else {
				?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

				<?php
				}

				?>
			</tbody>
		</table>
	</div>
</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>