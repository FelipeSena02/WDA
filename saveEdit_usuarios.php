<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];

        $sqlUpdate = "UPDATE usuarios SET nome='$nome',email='$email',cidade='$cidade',endereco='$endereco'
        WHERE id='$id'";
         $result = $conexao->query($sqlUpdate);
    }
    header('Location: usuarios.php');
?>