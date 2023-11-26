<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/consulta.css">
  <link rel="stylesheet" href="../assets/css/materialize.min.css" />
  <title>Consulta de usuários</title>
</head>

  <div class="container-table">
    <table class="striped">
      <caption></caption>
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Login</th>
          <th>Telefone Fixo</th>
          <th>Celular</th>
          <th>Nome da Mãe</th>
          <th>Data de Nascimento</th>
          <th>Endereço</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("conectar.php");
        $sql = "SELECT * FROM usuarios";
        $result = $mysqli->query($sql);
        ?>
        <tr>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td>
              <?php echo $row["id"]; ?>
            </td>
            <td>
              <?php echo $row["name"]; ?>
            </td>
            <td>
              <?php echo $row["cpf"]; ?>
            </td>
            <td>
              <?php echo $row["login"]; ?>
            </td>
            <td>
              <?php echo $row["phone"]; ?>
            </td>
            <td>
              <?php echo $row["cellphone"]; ?>
            </td>
            <td>
              <?php echo $row["motherName"]; ?>
            </td>
            <td>
              <?php echo $row["birth"]; ?>
            </td>
            <td>
              <?php echo $row["address"]; ?>
            </td>
          </tr>
        <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
