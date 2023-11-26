<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/materialize.min.css" />
  <link rel="stylesheet" href="../assets/css/2fa.css">
  <link rel="stylesheet" href="../assets/css/loginPage.css" />
  <link rel="stylesheet" href="../assets/css/butterup.min.css" />
  <script src="../assets/js/butterup.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <title>Autenticação de dois fatores</title>
</head>

<body>
  <?php
  include('../includes/toast.php');

  session_start();

  unset($_SESSION["login"]);

  include('../includes/conectar.php');

  $id = $_SESSION["id"];
  $typeUser = $_SESSION["typeUser"];

  $sql_code = "SELECT * FROM usuarios WHERE id = '$id' AND typeUser = '$typeUser'";

  $result = $mysqli->query($sql_code);
  $usuarios = $result->fetch_assoc();

  function perguntaIndice($indice)
  {
    $perguntas = array(
      "Qual é o nome da sua mãe?",
      "Qual é o seu número de celular?",
      "Qual é o seu endereço?"
    );

    return $perguntas[$indice];
  }

  function perguntaAtual()
  {
    if (empty($_SESSION['indice_pergunta'])) {
      $_SESSION['indice_pergunta'] = 0;
    }

    $indicePergunta = $_SESSION['indice_pergunta'];
    $indicePergunta = ($indicePergunta + 1) % 3;

    return $indicePergunta;
  }

  function obterRespostaCorretaPorIndice($indice)
  {
    global $usuarios;

    $respostasCorretas = array(
      $usuarios["motherName"],
      $usuarios["cellphone"],
      $usuarios["address"]
    );

    return strtolower($respostasCorretas[$indice]);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respostaFornecida = strtolower($_POST["resposta"]);

    $indicePergunta = $_SESSION['indice_pergunta'];
    $pergunta = perguntaIndice($indicePergunta);
    $respostaCorreta = obterRespostaCorretaPorIndice($indicePergunta);

    if ($respostaFornecida == $respostaCorreta) {
      $_SESSION["login"] = $usuarios["login"];
      $_SESSION["cpf"] = $usuarios["cpf"];

      header("Location: home.php");
    } else {
      echo '<script>toastAlert("Resposta incorreta!", "error")</script>';
    }
  }
  ?>
  <form class="container-2fa" method="post">
    <h1>2FA</h1>

    <?php
    $indicePergunta = perguntaAtual();

    echo '<span class="title-styled" for="resposta">' . perguntaIndice($indicePergunta) . '</span>';
    echo '<input type="text" id="resposta" name="resposta">';

    $_SESSION['indice_pergunta'] = $indicePergunta;
    ?>

    <div class="buttons-box">
      <button class="btn waves-effect waves-light" type="submit" name="action">
        Enviar
      </button>
      <a href="login.php"" class="btn waves-effect waves-light">Voltar</a>
    </div>
  </form>
</body>

</html>