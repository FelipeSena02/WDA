<?php
if(!empty($_GET['id']))
{
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM livro WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome = $user_data['nome'];
            $autor = $user_data['autor'];
            $editora = $user_data['editora'];
            $data_lanc = $user_data['data_lanc'];
            $estoque = $user_data['estoque'];
        }  
    } 
    else
    {
        header('Location: livro.php');
    }        
}
else
{
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
        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
    </head>
    <body class="fundo">
        <div class="box">
        <form action="saveEdit_livro.php" method="POST">
            <fieldset>
                <legend><b>Cadastrar Livro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome do Livro</label>
                </div>      
                <br><br>
                <div class="inputBox">
                    <input type="text" name="autor" id="autor" class="inputUser" value="<?php echo $autor ?>" required>
                    <label for="autor" class="labelInput">Autor do Livro</label>
                </div>      
                <br><br>
                <div class="inputBox">
                    <input type="text" name="editora" id="editora" class="inputUser" value="<?php echo $editora ?>" required>
                    <label for="editora" class="labelInput">Editora do Livro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="data_lanc"><b>Data de Lançamento:</b></label>
                    <input type="date" name="data_lanc" id="data_lanc" value="<?php echo $data_lanc ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="estoque" id="estoque" class="inputUser" value="<?php echo $estoque ?>" required>
                    <label for="estoque" class="labelInput">Estoque do Livro</label>
                </div>      
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
    </body>
</html>