<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/cadastro.css" />
  <link rel="stylesheet" href="../assets/css/loginPage.css" />
  <link rel="stylesheet" href="../assets/css/butterup.min.css" />
  <script src="../assets/js/butterup.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <title>Login</title>
</head>

<body>
  <?php

  include('../includes/conectar.php');
  include('../includes/toast.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $mysqli->real_escape_string($_POST["name"]);
    $motherName = $mysqli->real_escape_string($_POST["motherName"]);
    $login = $mysqli->real_escape_string($_POST["login"]);
    $cpf = $mysqli->real_escape_string($_POST["cpf"]);
    $phone = $mysqli->real_escape_string($_POST["phone"]);
    $cellphone = $mysqli->real_escape_string($_POST["cellphone"]);
    $address = $mysqli->real_escape_string($_POST["address"]);
    $password = $mysqli->real_escape_string($_POST["password"]);
    $birth = $mysqli->real_escape_string($_POST["birth"]);
    $gender = $mysqli->real_escape_string($_POST["gender"]);
    $typeUser = "commonUser";

    $sql = "SELECT login FROM usuarios WHERE login = '$login' OR cpf = '$cpf'";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {
      echo '<script>toastAlert("Usuário já existente!", "error")</script>';
    } else {
      
      $sql = "INSERT INTO
      usuarios (name, motherName, login, cpf, phone, cellphone, address, password, birth, gender, typeUser) 
      VALUES ('$name', '$motherName', '$login', '$cpf', '$phone', '$cellphone', '$address', '$password', '$birth', '$gender', '$typeUser')";

      if ($mysqli->query($sql) === true) {
        $_SESSION['toast_message'] = array(
          'message' => 'Usuário cadastrado com sucesso!',
          'type' => 'success'
        );
        header("Location: login.php");
      } else {
        echo '<script>toastAlert("Erro ao cadastrar usuário!", "error")</script>';
      }
    }

    $mysqli->close();
  }
  ?>

  <div class="container-cadastro">
    <img class="cad-image" src="../assets/images/fundo-space.jpg" alt="Desenho planeta roxo" />
    <form class="content-box-cad" method="post" id="cadastro-usuario">
      <a href="./login.php"><i class="small material-icons back-icon">arrow_back</i></a>
      <div class="container-inputs-cad">
        <h1 class="title-styled">Cadastre-se</h1>

        <div class="inputs-box">
          <div class="input">
            <label for="nome">Nome</label>
            <input type="text" name="name" id="nome" placeholder="Digite seu nome" required />
          </div>

          <div class="input">
            <label for="nome-materno">Nome Materno</label>
            <input type="text" name="motherName" id="nome-materno" placeholder="Digite o nome da sua mãe" required />
          </div>

          <div class="input">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="Digite seu login" autocomplete="name" required />
          </div>

          <div class="input">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" oninput="cpfMasc(this)" required />
          </div>

          <div class="input">
            <label for="phone">Telefone fixo</label>
            <input type="tel" name="phone" id="phone" placeholder="9999-9999" maxlength="9" onkeyup="handlePhone(this)"
              required />
          </div>

          <div class="input">
            <label for="cellphone">Celular</label>
            <input type="tel" name="cellphone" id="cellphone" maxlength="15" placeholder="(99) 9999-9999"
              oninput="handlePhone(this)" required />
          </div>

          <div class="input">
            <label for="address">Endereço completo</label>
            <input type="text" name="address" id="address" placeholder="Rua Amarilio dos Santos" required />
          </div>

          <div class="input">
            <label for="senha">Senha</label>
            <input type="password" name="password" id="senha" placeholder="**********" autocomplete="new-password"
              required />
          </div>

          <div class="input">
            <label for="confirmar-senha">Confirmar senha</label>
            <input type="password" name="confirm-password" id="confirmar-senha" placeholder="**********"
              autocomplete="current-password" class="validate" onkeyup="validarSenha()" required />
          </div>

          <div class="input">
            <label for="birth">Data de nascimento</label>
            <input type="date" name="birth" id="birth" required />
          </div>

          <div class="input">
            <label for="gender">Género </label>
            <div class="input-field col s12">
              <select name="gender" required>
                <option value="gender" disabled selected>
                  Escolha seu genêro
                </option>
                <option value="masc">Masculino</option>
                <option value="fem">Feminino</option>
              </select>
            </div>
          </div>
        </div>

        <div class="buttons-box">
          <button class="btn waves-effect waves-light" type="submit" name="action">
            Enviar
          </button>
          <button class="btn waves-effect waves-light" type="reset">
            Limpar
          </button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>