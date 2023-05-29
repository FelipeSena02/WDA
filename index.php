<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: tela-de-login.php');
    }
    $logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>INÍCIO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['NOME','Estoque'],

          <?php
          include_once('config.php');
          $sql = "SELECT * FROM livro";
          $consulta = mysqli_query($conexao, $sql);

          while($dados = mysqli_fetch_array($consulta)) {

            $nome = $dados['nome']; 
            $estoque = $dados['estoque']; ?>
        
          ['<?php echo $nome ?>', <?php echo $estoque ?>],

        <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Estoque',
            subtitle: 'Total de livros',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    </head>
    <body class="fundo">
        <header>
            <div class="container-logo">
                <div class="logo-imagem">
                    <img src="WDA.png" alt="image" height="70" width="100">
                </div>                
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">INÍCIO</a></li>
                    <li><a href="usuarios.php">USUÁRIOS</a></li>
                    <li><a href="editora.php">EDITORA</a></li>
                    <li><a href="livro.php">LIVRO</a></li>
                    <li><a href="aluguel.php">ALUGUEL</a></li>
                </ul>
            </div>
            <button class="saida"><a href="sair.php"><h6>SAIR</h6></a></button>
        </header>
        <br>
        <div style="display: flex; margin:1px">
        <div style="background-color:white; width:250px; height:100px; margin:5px">
        <br>
        <?php
        include_once('config.php');

        $sql_estoque = "SELECT SUM(estoque) AS total_livros FROM livro";
        
        $result_estoque = $conexao->query($sql_estoque);
        
        $linha_estoque = $result_estoque->fetch_assoc();
        
        if (isset($linha_estoque['total_estoques'])) {
        
          $quantidade_livros= $linha_estoque['total_livros'];
        
        }
        echo "Total de livros: ". $linha_estoque['total_livros'];
        ?>
        </div>
        <div style="background-color:white; width:250px; height:100px; margin:5px">
        <br>
        <?php
include_once('config.php');

$sql_aluguel = "SELECT COUNT(*) AS alugueis FROM aluguel";

$result_aluguel = $conexao->query($sql_aluguel);

$alugueis= $result_aluguel->fetch_assoc();

if (isset($alugueis['numero_alugueis'])) {

  $quantidade= $alugueis['alugueis'];

}
echo "Quantidade de aluguéis: ". $alugueis['alugueis'];
?>
        </div>
        <div style="background-color:white; width:250px; height:100px; margin:5px">
        <br>
        <?php
        include_once('config.php');
        $sql = "SELECT * FROM aluguel ORDER BY id DESC";

        $sql = $conexao->query($sql);

        $row = $sql->fetch_assoc();

        if($row==0) {
            echo "Nenhum livro alugado";
        }else{
        $livro = $row['livro'];
        echo "Último livro alugado: ".$livro;
        }
        ?>
        </div>
        </div>
        <br>
        <div id="columnchart_material" style="width: 950px; height: 350px; margin:10px"></div>
    </body>
</html>