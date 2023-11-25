<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/materialize.css">
  <link rel="stylesheet" href="../assets/css/menu.css">
  <title>Menu</title>
</head>

<body>
  <nav>
    <div class="avatar-container" id="avatar">
      <img src="../assets/images/man.png" alt="Avatar icone padrão">
      <span>Olá, <?php echo $_SESSION['login'] ?>!</span>
    </div>
    <div class="nav-wrapper">
      <ul class="right hide-on-med-and-down">
        <li><a href="../pages/home.php">Principal</a></li>
        <li>
          <a class="dropdown-trigger" data-target="menu-nav">
            Usuários <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
        <li><a href="../pages/banco.php">Modelo BD</a></li>
        <li><a href="../pages/logout.php">Logout</a></li>
      </ul>
    </div>
    <ul id="menu-nav" class="dropdown-content">
      <?php
        if (isset($_SESSION['typeUser']) && $_SESSION['typeUser'] === "masterUser"){
          echo "<li><a href='../pages/consulta.php'>Consulta</a></li>";
        }
      ?>
      <?php
        if (isset($_SESSION['typeUser']) && $_SESSION['typeUser'] === "commonUser"){
          echo "<li><a href='../pages/senha.php'>Alterar senha</a></li>";
        }
      ?>
    </ul>
  </nav>
  <script src="../assets/js/materialize.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>
