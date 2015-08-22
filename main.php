<?php session_start();
    include "comprusr.php";
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
								<div class="8u 12u(narrower)">

									<!-- Sidebar -->
										<div class="sidebar">
											<section>
												<header>
													<h3><strong>Operaciones con Inventarios</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con el inventario, puedes crear nuevos productos, eliminar viejos, modificar.</p>

											</section>
											<div class="5u 12u(narrower)" style="float:left">
												<div class="sidebar">
												<section>
													<header>
														<h4>Tipos de Productos</h4>
													</header>
													<p>Aquí puedes realizar operaciones para agregar, modificar y eliminar algún tipo de producto, tales como gaseosas, jugos, etc. </p>
													<footer>
														<ul class="buttons">
															<li><a href="tp.php" class="button small">Ir a Opción</a></li>
														</ul>
													</footer>
												</section>
												<section>
													<header>
														<h4>Presentaciones de productos</h4>
													</header>
													<p>Aquí puedes realizar operaciones para agregar, modificar y eliminar presentaciones de un producto, como por ejemplo: Pepsi lata. Pepsi Botella, Pepsi Desechable, etc.. </p>
													<footer>
														<ul class="buttons">
															<li><a href="#" class="button small">Ir a Opción</a></li>
														</ul>
													</footer>
												</section>
												</div>
											</div>
											<div class="5u 12u(narrower)" style="float:right">
												<div class="sidebar">
												<section>
													<header>
														<h4>Productos</h4>
													</header>
													<p>Aquí puedes realizar operaciones para agregar, modificar y eliminar Productos, como por ejemplo: Pepsi, Grapete, etc.</p>
													<footer>
														<ul class="buttons">
															<li><a href="#" class="button small">Ir a Opción</a></li>
														</ul>
													</footer>
												</section>
												<section>
													<header>
														<h4>Combos</h4>
													</header>
													<p>Aquí puedes realizar operaciones para agregar, modificar y eliminar Combos de productos, como por ejemplo: Six-Pack de gaseosas, Cajas de Gaseosas, etc.</p>
													<footer>
														<ul class="buttons">
															<li><a href="#" class="button small">Ir a Opción</a></li>
														</ul>
													</footer>
												</section>
												</div>
											</div>


										</div>

								</div>
								<div class="4u 12u(narrower)">

									<!-- Sidebar -->
										<div class="sidebar">
											<section>
												<header>
													<h3><strong>Ventas</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con el área de ventas</p>

											</section>
											<section>
												<header>
													<h4>Nueva Venta</h4>
												</header>
												<p><strong>Aquí puedes realizar ventas de producto a los clientes</strong></p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">Ir a Opción</a></li>
													</ul>
												</footer>
											</section>
                                            <section>
												<header>
													<h3><strong>Compras</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con el área de Compras</p>

											</section>
											<section>
												<header>
													<h4>Nueva Compra</h4>
												</header>
												<p><strong>Aquí puedes realizar compras de producto a los proveedores</strong></p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">Ir a Opción</a></li>
													</ul>
												</footer>
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
