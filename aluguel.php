<?php
include_once("config.php");

$sql = "SELECT * FROM aluguel ORDER BY id DESC";

if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM aluguel WHERE id LIKE '%$data%' or livro LIKE '%$data%' or usuario LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM aluguel ORDER BY id DESC";
    }

$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ALUGUEL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            <button class="saida"><a href="sair.php"><h5>SAIR</h5></a></button>
        </header>
        <button><a href="form_aluguel.php"><h3>+Cadastrar</h3></a></button>
        <div class ="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
            <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
            </svg>
            </button>
        </div>
        <div class="m-5">
            <table class="table text-white table-bd">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Livro</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Data de Aluguel</th>
                        <th scope="col">Previsão de Devolução</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['id']."</td>";
                                echo "<td>".$user_data['livro']."</td>";
                                echo "<td>".$user_data['usuario']."</td>";
                                echo "<td>".$user_data['data_aluguel']."</td>";
                                echo "<td>".$user_data['previsao']."</td>";
                                echo "<td>                                
                                    </a>
                                    <a class='btn btn-sm btn-danger' href='delete_aluguel.php?id=$user_data[id]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                    </a>
                                    </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
        </div>
    </body>
    <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'aluguel.php?search='+search.value;
    }
</script>
</html>