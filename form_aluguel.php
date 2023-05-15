<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

        $livro = $_POST['livro'];
        $usuario = $_POST['usuario'];
        $data_aluguel = $_POST['data_aluguel'];
        $previsao = $_POST['previsao'];

        $result = mysqli_query($conexao,"INSERT INTO aluguel(livro,usuario,data_aluguel,previsao) 
        VALUES('$livro','$usuario','$data_aluguel','$previsao')");

        header('Location: aluguel.php');
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
                <div class="inputBox">
                    <input type="text" name="livro" id="livro" class="inputUser" required>
                    <label for="livro" class="labelInput">Livro</label>
                </div>      
                <br><br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" required>
                    <label for="usuario" class="labelInput">Usuario</label>
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
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    </body>
</html>