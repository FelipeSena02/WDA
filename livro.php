<?php
include_once("config.php");

$sql = "SELECT * FROM livro ORDER BY id DESC";

if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM livro WHERE id LIKE '%$data%' or nome LIKE '%$data%' or autor LIKE '%$data%' or editora LIKE '%$data%' or
        data_lanc LIKE '%$data%' or estoque LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM livro ORDER BY id DESC";
    }

$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>LIVRO</title>
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
        <br>
        <button><a href="form_livro.php"><h3> Cadastrar Livro</h3></a></button>
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
                        <th scope="col">Nome </th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Lançamento</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                $data_lanc=date("d/m/Y",strtotime($user_data['data_lanc']));

                                echo "<tr>";
                                echo "<td>".$user_data['id']."</td>";
                                echo "<td>".$user_data['nome']."</td>";
                                echo "<td>".$user_data['autor']."</td>";
                                echo "<td>".$user_data['editora']."</td>";
                                echo "<td>".$data_lanc."</td>";
                                echo "<td>".$user_data['estoque']."</td>";
                                echo "<td>                                
                                    <a class='btn btn-sm btn-primary' href='edit_livro.php?id=$user_data[id]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                    </svg>
                                    </a>
                                    <a class='btn btn-sm btn-danger' href='delete_livro.php?id=$user_data[id]'>
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
        window.location = 'livro.php?search='+search.value;
    }
</script>
</html>