<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon" />
  <link rel="stylesheet" href="../assets/css/pdfStyle.css">
  <title>Consulta de usuários</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container-table {
      margin: 20px;
    }

    .tabela {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .tabela th,
    .tabela td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    .tabela th {
      background-color: #6922acb4;
      color: white;
    }

    .tabela tbody tr:nth-child(even) {
      background-color: #ececec;
    }
  </style>
</head>
<body>
  <div class="container-table">
    <table class="tabela">
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
      </tbody>
    </table>
  </div>
</body>
</html>
