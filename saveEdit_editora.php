<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cidade = $_POST['cidade'];

        $sqlUpdate = "UPDATE editora SET nome='$nome',email='$email',telefone='$telefone',cidade='$cidade'
        WHERE id='$id'";
         $result = $conexao->query($sqlUpdate);
    }
    header('Location: editora.php');
?>