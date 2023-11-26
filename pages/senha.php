<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/materialize.min.css" />
  <link rel="stylesheet" href="../assets/css/senha.css">
  <link rel="stylesheet" href="../assets/css/loginPage.css">
  <link rel="stylesheet" href="../assets/css/butterup.min.css" />
  <script src="../assets/js/butterup.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <title>Autenticação de dois fatores</title>
</head>

<body>
  <?php 
    include '../includes/menu.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      include('../includes/conectar.php');
    
      $idUser = $_SESSION["id"];
      $novSenha = $_POST["senha"];
      $confSenha = $_POST["confirmar-senha"];
      
      $sql = "UPDATE usuarios SET password = '$novSenha' WHERE id = '$idUser'";
    
      if ($mysqli->query($sql) === true) {
        echo '<script>toastAlert("Senha atualizada com sucesso!", "success")</script>';
      } else {
        echo '<script>toastAlert("Erro ao atualizar senha!", "error")</script>';
      }
    
      $mysqli->close();
    }
  ?>
  <form class="container-password" method="post">
    <h1>Alteração de senha</h1>
    <div class="password-box">
      <div class="input-box">
        <span>Senha:</span>
        <input id="senha" name="senha" type="text" placeholder="Digite sua senha!" required />
      </div>

      <div class="input-box">
        <span>Confirmar senha:</span>
        <input id="confirmar-senha" name="confirmar-senha" type="text" placeholder="Confirme a sua senha!" onkeyup="validarSenha()"
          required />
      </div>
    </div>

    <div class="buttons-box">
      <button class="btn waves-effect waves-light" type="submit" name="action">
        Enviar
      </button>
      <button type="reset" href="./login.php" class="btn waves-effect waves-light outline">Limpar</button>
    </div>
  </form>
  <?php include '../includes/footer.php' ?>
  <script src="../assets/js/script.js"></script>
</body>

</html>
