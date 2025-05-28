<?php
// acessar o index: localhost/exemplos/

// echo: imprimir mensagem; ex.: echo "olá mundo";
// $: declara variavel; ex.: $conexao
// -> é usado para acessar método ou propriedade de instância de classe


// 1 - Estabelecer uma conexão com o banco de dados

    $conexao = new PDO(
        "mysql:dbname=biblioteca;host=localhost", "root", "ceub123456"
    // "nome do banco de dados"; "host", "usuario", "senha"
    );

    $sql = $conexao->query("SELECT * FROM usuarios");
    // sql é igual a query de conexão
    $sql->execute();
    // sql execute: executa a query
    $usuarios = $sql->fetchAll();
    // retorna arrays indexadas em números

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5"> <h2 class="mb-4">Adicionar Novo Usuário</h2> <form action="#" method="POST" class="mb-5">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do usuário" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do usuário" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone do usuário" required>
            </div>
            <button type="submit" class="btn btn-success">Adicionar Usuário</button>
            <button type="reset" class="btn btn-warning">Limpar Campos</button>
        </form>

        ---

        <h2 class="mb-4">Usuários Cadastrados</h2> <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th> </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario) { ?>
                    <tr>
                <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['telefone'] ?></td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>