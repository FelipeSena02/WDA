<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $data_lanc = $_POST['data_lanc'];
        $estoque = $_POST['estoque'];

        $sqlUpdate = "UPDATE livro SET nome='$nome',autor='$autor',editora='$editora',data_lanc='$data_lanc',estoque='$estoque'
        WHERE id='$id'";
         $result = $conexao->query($sqlUpdate);
    }
    header('Location: livro.php');
?>