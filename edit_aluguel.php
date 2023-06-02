<?php
if(!empty($_GET['id']))
{
    include_once('config.php');

    date_default_timezone_set('America/Sao_Paulo');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM aluguel WHERE id=$id";

    $resulta = $conexao->query($sqlSelect);

    $aluguel = mysqli_fetch_assoc($resulta);
    $livro = $aluguel['livro'];

    $date = new DateTime();
    $hoje = $date -> format('d/m/Y');

    // Conexão tabela Livros
    $sql = "SELECT * FROM livro WHERE nome = '$livro'";
    $result = $conexao -> query($sql);

    $data = mysqli_fetch_assoc($result);
    $nome = $data['nome'];   
    $estoque_BD = $data['estoque'];
    $estoque_novo = $estoque_BD + 1;
        
    $alterar = "UPDATE livro SET estoque = '$estoque_novo' WHERE nome = '$nome'";
    $resultado = $conexao -> query($alterar);

    if($resulta -> num_rows > 0){
        $sql_update = "UPDATE aluguel SET devolucao = '$hoje' WHERE id = $id";
        $result_update = $conexao -> query($sql_update);
    }
    else{
        header('Location: aluguel.php');
    }
    header('Location: aluguel.php');
}
?>