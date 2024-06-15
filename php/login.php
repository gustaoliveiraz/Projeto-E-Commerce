<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Login</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="restrito/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="index.html">
        <span>
          Sobre
        </span>
      </a>
    </div>
    <!-- end header section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sobre.html">Sobre </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="loja.html">Camisetas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>				
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->

  <!-- about section -->

  <section class="login_section layout_padding">
    <div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="jumbotron">
					<h1 class="display-4">Login</h1>
					<form action="login.php" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1" class="form-label">Login</label>
							<input type="text" class="form-control" name="login">
							<small class="form-text text muted">Entre com seus dados de acesso.</small>
						  </div>
						  <div class="form-group">
							<label for="exampleInputPassword1">Senha</label>
							<input type="password" class="form-control" name="senha">
						  </div>
						  <button type="submit" class="btn btn-primary">Enviar</button>
						  <hr>
						  <a class="btn btn-danger" href="cadastro.php" role="button">Cadastrar</a>						  
					</form>
					<?php
						if (isset($_POST['login'])) {
							$login = $_POST['login'];
							$senha = md5($_POST['senha']);
							
							include "restrito/conexao.php";
							$sql = "SELECT * from usuarios WHERE login = '$login' AND senha = '$senha'";
							if ($result = mysqli_query($conn, $sql)) {
								$num_registros = mysqli_num_rows($result);
								if ($num_registros == 1) {
								$linha = mysqli_fetch_assoc($result);
								
								if (($login == $linha['login']) and ($senha == $linha['senha'])) {
								session_start();
								$_SESSION['login'] = "Robson";
								header("location: restrito");
							} else {
								echo "Login inválido!";
							}
							} else {
								echo "Login ou senha não encontrados ou inválido.";
								}
							} else {
								echo "Nenhum resultado no Banco de Dados.";
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
  </section>

  <!-- end about section -->

  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          SOHCamisetas
        </h2>
      </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>