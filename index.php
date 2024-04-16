<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cadastro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=novo">Novo Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Informações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php

                if (isset($_REQUEST["page"])) {
                    // Se estiver definido, então faz o switch
                    include("config.php");
                    switch ($_REQUEST["page"]) {
                        case "novo":
                            include("./pages/novo-usuario.php");
                            break;
                        case "listar":
                            include("./pages/lista-usuario.php");
                            break;
                        case "salvar":
                            include("./pages/salvar-usuario.php");
                            break;
                        case "editar":
                            include("./pages/editar-usuario.php");
                            break;
                        default:
                            print "<h1>Bem vindo</h1>";
                    }
                } else {
                    // Se 'page' não estiver definido, exibe uma mensagem padrão
                    print "<h1>Bem vindo</h1>";
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>