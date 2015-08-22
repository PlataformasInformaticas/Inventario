<?php session_start();

?>
<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Asomol - Manejo de Inventario</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.php">Asomol <span>Manejo de Inventarios</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.php">Inicio</a></li>

						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">


					<div class="inner">

						<header>
							<h2>Login</h2>
						</header>
                         <form  name="Login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<p>

						<?php
							if(isset($_POST['txtusr'])){
                                include 'conect.php';
                                $usr = $_POST['txtusr'];
                                $pas= $_POST['txtpas'];
                                $pas = sha1($pas);
                                $sql="SELECT id FROM Usuario where nombre='$usr' and password='$pas';";
                                if($resultado = $con -> query($sql)){

                                    if($resultado->num_rows > 0){

                                        $obj = $resultado->fetch_object();
                                        $ID=$obj->id;
                                        $_SESSION['loggedin'] = true;
                                        $_SESSION['userID'] = $ID;
                                        $_SESSION['start'] = time();
                                        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;
                                        header("Location: main.php");
                                        die();

                                    }
                                }else{
                                    echo 'No se pudo Iniciar Sesión.';
                                }
							}else{
						?>

								<label>Usuario: </label>
								<input type="Text" name="txtusr" required/>

								<label>Contraseña: </label>
								<input type="password" name="txtpas" required/>


						</p>
						<footer>
							<ul class="buttons vertical">
								<li><button type="submit">Enviar</button></li>
							</ul>
						</footer>
                        </form>
                        <?php
							}
						?>
					</div>

				</section>



			<!-- Footer -->
				<footer id="footer">



					<ul class="copyright">
						<li>&copy; Plataformas Informáticas</li><li> Web Application <a href="http://www.plataformasinformaticas.com">PI.com</a></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
