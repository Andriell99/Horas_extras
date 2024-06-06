<?php
class Controle {
    private $nome;
    private $hora;
    private $dia;
    private $empresa;
    private $saldo;

    public function __construct($nome = "", $hora = "", $dia = "", $empresa = "") {
        $this->nome = $nome;
        $this->hora = $hora;
        $this->dia = $dia;
        $this->empresa = $empresa;
        $this->saldo = 0; // Inicializa o saldo como 0
    }

    public function inserirDados() {
        // Conectar ao banco de dados
        $bd = mysqli_connect("localhost", "root", "", "controller");

        // Verificar a conexão
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Executar a consulta para inserir os dados no banco de dados
        $query = "INSERT INTO registros (nome, hora, dia, empresa) VALUES ('$this->nome', '$this->hora', '$this->dia', '$this->empresa')";
        if (mysqli_query($bd, $query)) {
             echo "<script>
                    alert('DADOS INSERIDOS COM SUCESSO!');
                    setTimeout(function() {
                        window.location.href = 'Cadastro.html';
                    }, 1000);
                  </script>";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($bd);
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($bd);
    }
    
    public function consultarDados() {
        // Conectar ao banco de dados
        $bd = mysqli_connect("localhost", "root", "", "controller");

        // Verificar a conexão
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Executar a consulta para recuperar os dados do banco de dados
        $query = "SELECT * FROM registros";
        $result = mysqli_query($bd, $query);

        // Verificar se a consulta retornou algum resultado
        if (mysqli_num_rows($result) > 0) {
            // Criar um array para armazenar os dados
            $dados = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $dados[] = $row;
            }
            return $dados;
        } else {
            return array();
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($bd);
    }
    
    public function deletarDados($id){
        $bd= mysqli_connect("localhost","root","","controller");
        
         // Verificar a conexão
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        
         // Executar a consulta para recuperar os dados do banco de dados
        $query = "delete  FROM registros where id=$id";
        $result = mysqli_query($bd, $query);
        
        if (mysqli_query($bd, $query)) {
            // Retorne uma mensagem de sucesso se a exclusão for bem-sucedida
            return  "<script>
                    alert('DADOS deletados COM SUCESSO!');
                    setTimeout(function() {
                        window.location.href = 'Consulta.php';
                    }, 1000);
                  </script>";
        } else {
            // Retorne uma mensagem de erro se a exclusão falhar
            return "Erro ao excluir registro: " . mysqli_error($result);
        }
         // Fechar a conexão com o banco de dados
        mysqli_close($bd);
        
        
    }
    
    
    
}
    
    