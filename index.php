<?php 

  require_once('cadastrar.php');

  $projetos = new Projeto();
  $projetos = $projetos->retornaProjetos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potfólio | GSFZamai</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/cadastro.phtml">GSFZamai</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre Mim</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Projetos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Pessoais</a></li>
                  <li><a class="dropdown-item" href="#">Cursos</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

        <div class="container mt-5 d-flex flex-wrap justify-content-center">
        
            <div class="container d-flex justify-content-center">
                <h2>Projetos recentes</h2>
            </div>

          <?php foreach($projetos as $projeto) { ?>

            <div class="card me-auto mt-2" style="width: 18rem;" id="<?= 'projeto-'.$projeto['id'] ?>">
              <img <?= ($projeto['imagem'] == '' ? 'hidden' : '') ?> src="<?=$projeto['imagem']?>" class="card-img-top" alt="...">
              <div class="card-body">
                  <h5 class="card-title"><?= $projeto['titulo'] ?></h5>
                  <hr>
                  <p class="card-text"><?= $projeto['descricao'] ?></p>
                  <div class="d-flex d-wrap justify-content-evenly">
                      <a href="<?= $projeto['github'] ?>" class="btn btn-primary">GitHub</a>
                      <a href="<?= $projeto['link'] ?>" class="btn btn-primary">Link</a>
                  </div>
              </div>
            </div>

          <?php } ?>


        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>