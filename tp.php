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
	<body class="left-sidebar">
		<div id="page-wrapper">
            <?php
                include ("menu.php");
            ?>
			<!-- Main -->
				<article id="main">


					<!-- One -->
						<section class="wrapper style4 container">

							<div class="row 150%">
								<div class="12u 12u(narrower)">

									<!-- Sidebar -->
										<div class="sidebar">
											<section class="formulario">
												<header>
													<h3><strong>Tipos de Productos</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con el inventario, puedes crear nuevos productos, eliminar viejos, modificar.</p>
												<p>

												<table border="1" style="width:auto">
													<tr>
														<th>id</th>
														<th>Descripción</th>
														<th  colspan="2">Tareas</th>
													</tr>
													<tr>
    													<td>1</td>
    													<td>Gaseosas</td>
														<td><Button onclick="">Editar</button></td>
														<td><Button id="opener" >Eliminar</button></td>
  													</tr>
													<tr>
    													<td>2</td>
    													<td>Jugos</td>
														<td>
															<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
															<Button name="btnEditar" type="submit" value="2" >Editar</button></td>
															</form>
														<td><Button id="opener" onclick="">Eliminar</button></td>
  													</tr>
												</table>
												</p>

											</section>

										</div>

								</div>


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
