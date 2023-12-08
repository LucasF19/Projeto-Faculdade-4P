<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/consulta.css">
  <link rel="stylesheet" href="../assets/css/materialize.min.css" />
  <link rel="stylesheet" href="../assets/css/butterup.min.css" />
  <script src="../assets/js/butterup.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <title>Consulta de usuários</title>
</head>

<body>
  <?php

  include '../includes/menu.php';
  include('../includes/security.php');
  include('../includes/conectar.php');

  $sql_code = "SELECT * FROM usuarios";
  $result = $mysqli->query($sql_code);

  $typeUser = $_SESSION["typeUser"];

  if($typeUser == "commonUser"){
    echo '<script>toastAlert("Usuário comum não consulta banco!", "error")</script>';
    exit();
  }

  if (isset($_GET['excluir']) && isset($_GET['id'])) {

    $idUsuarioExcluir = $_GET['id'];

    $sqlExcluir = "DELETE FROM usuarios WHERE id = $idUsuarioExcluir";

    if ($mysqli->query($sqlExcluir) === true) {
      echo '<script>toastAlert("Usuário excluido com sucesso!", "success")</script>';
    } else {
      echo '<script>toastAlert("Erro ao excluir usuário!", "error")</script>';
    }
  }
  ?>

  <div class="container-consulta">
    <h1>Consulta do usuário</h1>
    <div class="row">
      <div class="inputs col s12">
        <span>Procurar:</span>
        <div class="input-field inline">
          <input id="pesquisa-input" type="search" oninput="pesquisarConsulta()" class="active" />
          <label for="pesquisa-input">Nome</label>
        </div>
      </div>
    </div>
    <div class="container-table">
      <table class="striped">
        <caption></caption>
        <thead>
          <tr>
            <th>Login</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Endereço</th>
            <th>Opção</th>
          </tr>
        </thead>
        <tbody id="resultados">
          <?php

          if (!empty($_GET['search'])) {
            $data = $_GET['search'];
            $sql = "SELECT * FROM usuarios where id LIKE '%$data%' or name LIKE '%$data%' or cpf LIKE '%$data%' or login LIKE '%$data%' ORDER BY id DESC";

          } else {
            $sql = "SELECT * FROM usuarios  ORDER BY id DESC";
          }

          $result = $mysqli->query($sql);
          $numRows = mysqli_num_rows($result);

          if ($numRows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $login = $row['login'];
              $name = $row['name'];
              $nascimento = $row['birth'];
              $endereco = $row['address'];
              $typeUser = $row['typeUser'];
  
              if ($typeUser != 'masterUser') {
                $dtNascimento = new DateTime($nascimento);
                $atDate = new DateTime();
  
                $diferenca = $dtNascimento->diff($atDate);
                $idade = $diferenca->y;
  
                echo "<tr>";
                echo "<td>$login</td>";
                echo "<td>$name</td>";
                echo "<td>$idade</td>";
                echo "<td>$endereco</td>";
                echo "<td><a href='?excluir=true&id=$id' class='waves-light btn-small purple'><i class='material-icons left'>delete</i>Excluir</a></td>";
                echo "</tr>";
              }
            }
          } else {
            echo "<td>Não há usuários comuns na tabela</td>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="container-buttons">
      <a href="home.php" class="button-style">Voltar</a>
      <a href="../includes/gerarpdf.php" class="button-style">Gerar PDF</a>
    </div>
  </div>
  <?php include '../includes/footer.php' ?>
</body>

</html>