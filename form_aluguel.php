<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

        $entrada = new DateTime($_POST['data_aluguel']);
        $saida = new DateTime($_POST['previsao']);
        $intervalo = $entrada->diff($saida);
        $dias = $intervalo->format('%a');
        $hoje = date("Y-m-d");

        $livro = $_POST['livro'];
        $sql = "SELECT * FROM livro WHERE nome = '$livro'";
        $result = $conexao->query($sql);
        $data = mysqli_fetch_assoc($result);
        $estoque_BD = $data['estoque'];
        $estoque_novo = $estoque_BD - 1;

        if($dias > 30) {
            echo "<script> alert('O limite de aluguel é de 30 dias') </script>";
        } else if($entrada > $saida) {
            echo "<script> alert('A data do aluguel não pode ser maior que a data da devolução') </script>";
        } if($estoque_novo < 0) {
            echo "<script> alert('Livro esgotado') </script>"; 
        } else {
        $livro = $_POST['livro'];
        $usuario = $_POST['usuario'];
        $data_aluguel = $_POST['data_aluguel'];
        $previsao = $_POST['previsao'];
        $devolucao = $_POST['devolucao'];
        $result = mysqli_query($conexao,"INSERT INTO aluguel(livro,usuario,data_aluguel,previsao) 
        VALUES('$livro','$usuario','$data_aluguel','$previsao')");

        $sql = "SELECT * FROM livro WHERE nome = '$livro'";
        $result = $conexao->query($sql);
        $data = mysqli_fetch_assoc($result);
        $nome = $data['nome'];
        $estoque_BD = $data['estoque'];
        $estoque_novo = $estoque_BD - 1;

        $alterar = "UPDATE livro SET estoque = '$estoque_novo' WHERE nome = '$nome'";
        $resultado = $conexao->query($alterar);
        header('Location: aluguel.php');
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Aluguel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("livraria.jpg");
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 12px;
            border-radius: 15px;
            width: 45%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_aluguel{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #previsao{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
    </head>
    <body class="fundo">
        <div class="box">
        <form action="form_aluguel.php" method="POST">
            <fieldset>
                <legend><b>Cadastrar Aluguel</b></legend>
                <br>
                <div class="input-box">
                        <div class="select">
                            <label for="Livro">Livro</label>
                            <select class="select" name="livro">
                                <option>Selecione</option>
                                <?php
                                include_once('config.php');
                                $sql = "SELECT * FROM livro ORDER BY id";
                                $res = mysqli_query($conexao, $sql);
                                while ($cadastro = mysqli_fetch_row($res)) {
                                    
                                    $li = $cadastro[1];
                                    
                                    $livro = $cadastro[1];

                                    echo "<option class='livro' value='$li'>$livro</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>      
                <br><br>
                <div class="input-box">
                        <div class="select">
                            <label for="Usuario">Usuário</label>
                            <select class="select" name="usuario">
                                <option>Selecione</option>
                                <?php
                                include_once('config.php');
                                $sql = "SELECT * FROM usuarios ORDER BY id";
                                $res = mysqli_query($conexao, $sql);
                                while ($cadastro = mysqli_fetch_row($res)) {
                                    
                                    $us = $cadastro[1];
                                    
                                    $usuarios = $cadastro[1];

                                    echo "<option class='usuario' value='$us'>$usuarios</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>      
                <br><br>
                <div class="inputBox">
                    <label for="data_aluguel"><b>Data de Aluguel:</b></label>
                    <input type="date" name="data_aluguel" id="data_aluguel" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="previsao "><b>Previsão de Devolução:</b></label>
                    <input type="date" name="previsao" id="previsao" required>
                </div>
                <br><br>
                <input  type="hidden" name="devolucao"  id="devolucao" value="">
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    </body>
</html>