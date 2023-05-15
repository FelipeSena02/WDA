<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $data_lanc = $_POST['data_lanc'];
        $estoque = $_POST['estoque'];

        $result = mysqli_query($conexao,"INSERT INTO livro(nome,autor,editora,data_lanc,estoque) 
        VALUES('$nome','$autor','$editora','$data_lanc','$estoque')");

        header('Location: livro.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Livro</title>
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
        #data_lanc{
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
        select{
            height: 30px;
        }
    </style>
    </head>
    <body class="fundo">
        <div class="box">
        <form action="form_livro.php" method="POST">
            <fieldset>
                <legend><b>Cadastrar Livro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome do Livro</label>
                </div>      
                <br><br>
                <div class="inputBox">
                    <input type="text" name="autor" id="autor" class="inputUser" required>
                    <label for="autor" class="labelInput">Autor do Livro</label>
                </div>      
                <br><br>
                <select name="select_editora">
					<option>Nome da Editora</option>
					<?php
                    include_once('config.php');
					$result = "SELECT * FROM editora";
					$resultado = mysqli_query($conexao, $result);
					while($row = mysqli_fetch_assoc($resultado)){ ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option><?php
					}
					?>
				</select>
                <br><br>
                <div class="inputBox">
                    <label for="data_lanc"><b>Data de Lançamento:</b></label>
                    <input type="date" name="data_lanc" id="data_lanc" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="estoque" id="estoque" class="inputUser" required>
                    <label for="estoque" class="labelInput">Estoque do Livro</label>
                </div>      
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    </body>
</html>