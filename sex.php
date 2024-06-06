
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Inclua o arquivo que contém a definição da classe Controle
require_once 'Controle.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os valores dos campos do formulário
    $name = @$_POST["nome"];
    $hor = @$_POST["horas"];
    $dia = @$_POST["dia"];
    $emp = @$_POST["empresa"];

    // Instancia um objeto da classe Controle com os dados fornecidos
    $controle = new Controle($name, $hor, $dia, $emp);

    // Chama o método para inserir os dados no banco de dados
    $controle->inserirDados();
    
    // Redireciona para a página inicial
}
?>


</body>
</html>
