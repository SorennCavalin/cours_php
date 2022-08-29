<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="/">Biblio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if (!empty($_SESSION["abonne"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/espace_abonne.php"><?= $_SESSION["abonne"]["pseudo"] ?></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/deconnexion.php">
                                <i class="fa fa-sign-out"></i>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/connexion.php">
                                <i class="fa fa-sign-in"></i>
                            </a>
                        </li>
                    <?php endif ?>


                    <?php if (connecteAdmin()) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Livres
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="livre_liste.php">Liste</a>
                                <a class="dropdown-item" href="livre_ajouter.php">Ajouter</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Abonnés
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="abonne_liste.php">Liste</a>
                                <a class="dropdown-item" href="abonne_ajouter.php">Ajouter</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Emprunts
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="emprunt_liste.php">Liste</a>
                                <a class="dropdown-item" href="emprunt_ajouter.php">Ajouter</a>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Messages -->
        <?php if (!empty($_SESSION["erreur"])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION["erreur"] ?>
                <?php $_SESSION["erreur"] = [] ?>
            </div>
        <?php endif ?>

        <?php if (!empty($_SESSION["succes"])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION["succes"] ?>
                <?php $_SESSION["succes"] = [] ?>
            </div>
        <?php endif ?>

        <h1><?= $h1 ?? "Bienvenue à la biblio" ?></h1>