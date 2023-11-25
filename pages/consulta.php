<?php
  include('../includes/security.php');

  $username = 'root';
  $password = '';
  $database = 'login';
  $host = 'localhost';

  $mysqli = new mysqli($host, $username, $password, $database);

  if ($mysqli->connect_error) {
    header("Location: error.php");
    die("Falha na conexão: " . $mysqli->connect_error);
  }

  $sql_code = "SELECT * FROM usuarios";
  $result = $mysqli->query($sql_code);

  if (isset($_POST['excluir'])) {
    // Obter o ID do usuário a ser excluído
    $idUsuarioExcluir = $_POST['id_usuario_excluir'];

    // Executar a consulta de exclusão
    $sqlExcluir = "DELETE FROM usuarios WHERE cpf = $idUsuarioExcluir";
    if ($conn->query($sqlExcluir) === TRUE) {
        echo "Usuário excluído com sucesso.";
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/consulta.css">
    <link rel="stylesheet" href="../assets/css/materialize.min.css"/>
    <title>Consulta de usuários</title>
  </head>
  <body>
    <?php include '../includes/menu.php'?>
    <div class="container-consulta">
      <h1>Consulta do usuário</h1>
      <div class="row">
        <div class="inputs col s12">
          <span>Procurar:</span>
          <div class="input-field inline">
            <input id="email_inline" type="email" class="active" />
            <label for="email_inline">Nome</label>
          </div>
        </div>
      </div>
      <div class="container-table">
        <table class="striped">
          <caption></caption>
          <thead>
            <tr>
              <th>Login</th>
              <th>Tipo de usuário</th>
              <th>Idade</th>
              <th>Endereço</th>
              <th>Opção</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = $result->fetch_assoc()) {

                $login = $row['login'];
                $typeUser = $row['typeUser'];
                $nascimento = $row['birth'];
                $endereco = $row['address'];

                if($typeUser === "commonUser"){
                  $typeUser = "Usuário Comum";
                } else {
                  $typeUser = "Usuário Master";
                }

                //Formatar data de nascimento
                $dtNascimento = new DateTime($nascimento);
                $atDate = new DateTime();

                $diferenca = $dtNascimento->diff($atDate);
                $idade = $diferenca->y;

                echo "<tr>";
                echo "<td>$login</td>";
                echo "<td>$typeUser</td>";
                echo "<td>$idade</td>";
                echo "<td>$endereco</td>";
                echo "<td><a class='waves-light btn-small purple'><i class='material-icons left'>delete</i>Excluir</a></td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="container-buttons">
        <a href="../pages/home.php" class="button-style">Voltar</a>
        <a href="#" class="button-style">Gerar PDF</a>
      </div>
    </div>
    <?php include '../includes/footer.php'?>
  </body>
</html>
