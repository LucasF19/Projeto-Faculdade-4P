<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/materialize.css">
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/loginPage.css">
  <link rel="stylesheet" href="../assets/css/butterup.min.css" />
  <script src="../assets/js/butterup.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <title>Login</title>
</head>

<body>
  <?php
  include('../includes/toast.php');
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = 'root';
    $password = '';
    $database = 'login';
    $host = 'localhost';

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_error) {
      header("Location: error.php");
      die('Falha ao conectar ao banco de dados!' . $mysqli->connect_error);
    }

    $login = $mysqli->real_escape_string($_POST["login"]);
    $password = $mysqli->real_escape_string($_POST["password"]);
    $typeUser = $_POST["group1"];

    $sql_code = "SELECT * FROM usuarios WHERE login = '$login' AND password = '$password' AND typeUser = '$typeUser'";

    $result = $mysqli->query($sql_code);
    $usuarios = $result->fetch_assoc();

    if($typeUser == "commonUser"){
      $_SESSION["id"] = $usuarios["id"];
      $_SESSION["typeUser"] = $usuarios["typeUser"];

      header("Location: 2fa.php");

    } else {
      if ($result->num_rows == 1) {
        if (!isset($_SESSION)) {
          session_start();
        }
  
        $_SESSION["id"] = $usuarios["id"];
        $_SESSION["cpf"] = $usuarios["cpf"];
        $_SESSION["login"] = $usuarios["login"];
        $_SESSION["typeUser"] = $usuarios["typeUser"];
  
        header("Location: home.php");
        
      } else {
        echo '<script>toastAlert("Usuário não encontrado!", "error")</script>';
      }
    }
  }
  ?>

  <div class="container-login">
    <img src="../assets/images/fundo-space.jpg" alt="Desenho planeta roxo">
    <form class="content-box" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <div class="container-inputs">
        <h1 class="title-styled">Login</h1>

        <div class="inputs-box">
          <div class="login-box">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="Digite seu nome" required>
          </div>

          <div class="password-box">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
          </div>

          <div class="group-users">
            <p>
              <label>
                <input name="group1" type="radio" value="masterUser" checked />
                <span>Usuário Master</span>
              </label>
            </p>
            <p>
              <label>
                <input name="group1" type="radio" value="commonUser" />
                <span>Usuário Comum</span>
              </label>
            </p>
          </div>
        </div>

        <div class="buttons-box">
          <button class="btn waves-effect waves-light" type="submit" name="action">
            Login
          </button>
          <a href="./cadastro.php" class="btn waves-effect waves-light">Criar Conta</a>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
