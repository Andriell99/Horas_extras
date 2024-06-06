<?php
// Inclua o arquivo que contém a definição da classe Controle
require_once 'Controle.php';

// Instância da classe Controle
$controle = new Controle();

// Verifique se o ID do registro a ser excluído foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    if (isset($_POST['selecao']) && !empty($_POST['selecao'])) {
        // Itera sobre os IDs selecionados e exclui os registros correspondentes
        foreach ($_POST['selecao'] as $id) {
            $mensagem = $controle->deletarDados($id);
            echo $mensagem; // Exibe a mensagem de exclusão para cada registro
        }
    } else {
        echo 'Nenhum registro selecionado para exclusão.';
    }
}

// Chama o método para consultar os dados do banco de dados
$dados = $controle->consultarDados();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Consulta Hora Extra</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Consulta.css">
    <style>
        .linha-selecionavel {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Consulta de Hora Extra</h1>
    <form action="" method="post">
        <table>
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Nome</th>
                    <th>Hora</th>
                    <th>Dia</th>
                    <th>Empresa</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $dado): ?>
                    <tr class="linha-selecionavel">
                        <td><input type="checkbox" name="selecao[]" value="<?php echo $dado['id']; ?>"></td>
                        <td><?php echo htmlspecialchars($dado['nome']); ?></td>
                        <td><?php echo htmlspecialchars($dado['hora']); ?></td>
                        <td><?php echo htmlspecialchars($dado['dia']); ?></td>
                        <td><?php echo htmlspecialchars($dado['empresa']); ?></td>
                        <td><?php echo htmlspecialchars($dado['saldo']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" name="excluir">Excluir Selecionados</button>
    </form>
</body>
</html>
