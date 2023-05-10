<!DOCTYPE html>
<html>
    <head>
        <title>TELA DE LOGIN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <style>
.login{
    font-family: Arial, Helvetica, sans-serif;
    background-color: #4287f5;
}            
.tela-login{
    background-color: #4F4F4F;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 80px;
    border-radius: 15px;
}
.text-login{
    color: white;
}
.input{
    padding: 15px;
    border: none;
    outline: none;
    font-size: 15px;
    width: 100%;
}
.inputSubmit{
    background-color: dodgerblue;
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
    font-size: 15px;
    color: white;
}
.inputSubmit:hover{
    background-color: deepskyblue;
    cursor: pointer;
}
    </style>
    </head>
    <body class="login">
        <div class="tela-login">
            <h1 class="text-login">Login</h1>
            <br>
            <form action="testlogin.php" method="POST">
            <input class="input" type="text" name="email" placeholder="E-mail">
            <br><br>
            <input class="input" type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            <br><br>
            <p>Ainda não tem uma conta? <a href="formulario.php">Criar Conta</a></p>
            </form>
        </div>
    </body>
</html>
