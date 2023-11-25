<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/images/phone-call.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Home</title>
</head>
<body>
  <?php
    include('../includes/menu.php');
    include('../includes/security.php');
  ?>
  <main class='main-content'>
    <div class="title-content">
      <h2>Inscreva-se agora na <span class="golden-tech-title">Golden Tech</span></h2>
      <p>
        Descubra o poder de se manter conectado com a
        evolução constante do nosso mundo! Veja a lista de usuários
        que já fazem parte da equipe.
      </p>
      <a href="./consulta.php" class="button-outline">Usuários</a>
    </div>
    <img src="../assets/images/Mobile-user-amico-1.png" alt="mulher-roxa">
  </main>
  <section class="container-section">
    <h3 class="title-section">Serviços</h3>

    <div class="card-container">
      <div class="card">
        <img src="../assets/images/college class-amico.png" alt="Escritório">
        <div class="content-card">
          <h4>Usuários</h4>
          <p>Veja a lista de usuários que fazem parte da nossa empresa!</p>
          <div class="button-card-content">
            <a href="./consulta.php" class="acessar-button">Acessar</a>
          </div>
        </div>
      </div>

      <div class="card">
        <img src="../assets/images/Server-amico.png" alt="Servidor">
        <div class="content-card">
          <h4>Modelo BD</h4>
          <p>Confira o modelo de banco de dados utilizado por nós!</p>
          <div class="button-card-content">
            <a href="#" class="acessar-button">Acessar</a>
          </div>
        </div>
      </div>

      <div class="card">
        <img src="../assets/images/Reset-password.png" alt="Cdeado de senha">
        <div class="content-card">
          <h4>Alterar senha</h4>
          <p>Esqueceu sua senha? Altere com facilidade e praticidade.</p>
          <div class="button-card-content">
            <a href="#" class="acessar-button">Acessar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="container-empresa">
    <h3 class="title-section-empresa">Sobre a empresa</h3>

    <div class="sobre-empresa-conteudo">
      <img src="../assets/images/Education-pana-1.png" alt="Pessoas conversando">
      <p>Com uma equipe altamente qualificada e apaixonada por tecnologia, a
        <span class="bold-purple">Golden Tech</span>
        oferece uma ampla gama de serviços para atender às necessidades de seus clientes.
        Isso inclui desenvolvimento de software personalizado, consultoria em TI, suporte técnico,
        segurança cibernética e gerenciamento de sistemas.</p>
    </div>
  </section>
  <section class="container-section">
    <h3 class="title-section">Equipe</h3>

    <div class="container-card-equipes">

      <div class="card-perfil-equipe">
        <img src="../assets/images/Taylor.jpg" alt="Profissional desenvolvedor">
        <div class="conteudo-card-equipes">
          <h2>Rafael</h2>
          <span>Desenvolvedor full-stack</span>
        </div>
      </div>

      <div class="card-perfil-equipe">
        <img src="../assets/images/rachel-mcdermot.jpg" alt="Profissional designer">
        <div class="conteudo-card-equipes">
          <h2>Paola</h2>
          <span>Designer</span>
        </div>
      </div>

      <div class="card-perfil-equipe">
        <img src="../assets/images/aiony.jpg" alt="Profissional QA">
        <div class="conteudo-card-equipes">
          <h2>Amanda</h2>
          <span>Quality Assurance (QA)</span>
        </div>
      </div>

      <div class="card-perfil-equipe">
        <img src="../assets/images/luis-villasmil.jpg" alt="Profissional arquiteto TI">
        <div class="conteudo-card-equipes">
          <h2>Marcos</h2>
          <span>Banco de dados</span>
        </div>
      </div>
    </div>
  </section>
  <?php include '../includes/footer.php'?>
</body>
</html>
