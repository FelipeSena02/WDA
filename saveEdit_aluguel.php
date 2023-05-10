<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $livro = $_POST['livro'];
        $usuario = $_POST['usuario'];
        $data_aluguel = $_POST['data_aluguel'];
        $previsao = $_POST['previsao'];

        $sqlUpdate = "UPDATE aluguel SET livro='$livro',usuario='$usuario',data_aluguel='$data_aluguel',previsao='$previsao'
        WHERE id='$id'";
         $result = $conexao->query($sqlUpdate);
    }
    header('Location: aluguel.php');
?>