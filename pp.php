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
                include "menu.php";
                include "comprusr.php";
                include "conect.php";
            ?>
			<!-- Main -->
				<article id="main">


					<!-- One -->
						<section class="wrapper style4 container">
                            <div class="paginador">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="main.php">Main </a>
                                        </li>
                                        <li>
                                            >>
                                        </li>
                                        <li>
                                            <a href="pp.php"> Presentación de Producto </a>
                                        </li>
                                        <?php
                                            if(isset($_POST['btnEditar'])){
                                        ?>
                                                    <li>
                                                     >>
                                                    </li>
                                                    <li>
                                                        <strong>Editar</strong>
                                                    </li>
                                        <?php

                                            }elseif(isset($_POST['btnDel'])){


                                        ?>          <li>
                                                     >>
                                                    </li>
                                                    <li>
                                                        <strong>Eliminar</strong>
                                                    </li>
                                        <?php

                                            }elseif(isset($_POST['btnAdd'])){
                                         ?>
                                                    <li>
                                                     >>
                                                    </li>
                                                    <li>
                                                        <strong>Añadir</strong>
                                                    </li>
                                        <?php
                                            }
                                        ?>

                                    </ul>
                                </nav>
                            </div>
							<div class="row 150%">
								<div class="12u 12u(narrower)">

									<!-- Sidebar -->
										<div class="sidebar">

											<section class="formulario">
												<header>
													<h3><strong>Presentación de Productos</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con el inventario, puedes crear nuevas presentaciones de productos, eliminar viejos y modificar.</p>
												<p>
                                                <?php
                                                    //editar
                                                    //SELECT id, descripcion FROM presentacionProducto;

                                                    if(isset($_POST['btnEditar'])){
                                                        if(isset($_POST['txtEditar'])){
                                                            //guardar
                                                            $sql="UPDATE `presentacionProducto` SET `descripcion`='".$_POST['txtEditar']."' WHERE `id`='".$_POST['btnEditar']."';";
                                                            $con -> query($sql);
                                                    ?>
                                                    <a href="pp.php" class="button special">Datos Guardados. Regresar</a>
                                                    <?php
                                                        }else{
                                                            //cargar formulario para modificar

                                                        $sql="SELECT descripcion FROM presentacionProducto where id='".$_POST['btnEditar']."'";
                                                        $resultado = $con -> query($sql);
                                                        $obj = $resultado->fetch_object();
                                                ?>
                                                    <form name="frmEditar" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                        <label>Descripción: </label>
                                                        <input name="txtEditar" type="text" value="<?php echo $obj->descripcion ; ?>"/>
                                                        <input type="hidden" name="btnEditar" value="<?php echo $_POST['btnEditar'];?>">
                                                        <a href="pp.php" class="button special">Regresar</a>
                                                        <input class="special" value="Guardar" type="submit" >
                                                    </form>
                                                <?php
                                                        }
                                                    }elseif(isset($_POST['btnDel'])){
                                                        //eliminar
                                                        if(isset($_POST['chbDel'])){
                                                            //guardar
                                                            $sql="DELETE FROM  `presentacionProducto` WHERE `id`='".$_POST['btnDel']."';";
                                                            $con -> query($sql);
                                                    ?>
                                                            <a href="pp.php" class="button special">Datos eliminados. Regresar</a>
                                                    <?php
                                                        }else{
                                                            //cargar formulario para eliminar
                                                            $sql="SELECT descripcion FROM presentacionProducto where id='".$_POST['btnDel']."'";
                                                            $resultado = $con -> query($sql);
                                                            $obj = $resultado->fetch_object();
                                                    ?>
                                                        <form name="frmEditar" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                            <p>
                                                                Si elimina este tipo de producto; eliminara tambien todos los productos, ventas, compras y transacciones asociadas a este, generando problemas con sus datos.
                                                            </p>

                                                            <input type="checkbox" name="chbDel" value="true">Esta seguro que desea eliminar este tipo de producto. <strong><?php echo $obj->descripcion ; ?></strong><br>
                                                            <input type="hidden" name="btnDel" value="<?php echo $_POST['btnDel'];?>">
                                                            <a href="pp.php" class="button special">Regresar</a>
                                                            <input class="special" value="Guardar" type="submit" >

                                                        </form>
                                                    <?php
                                                        }
                                                        //añadir
                                                    }elseif(isset($_POST['btnAdd'])){
                                                        if(isset($_POST['txtTp'])){
                                                            //guardar
                                                            $sql="INSERT INTO `presentacionProducto` (`descripcion`) VALUES ('".$_POST['txtTp']."');";
                                                            $con -> query($sql);
                                                    ?>
                                                            <a href="pp.php" class="button special">Datos Guardados. Regresar</a>
                                                    <?php
                                                        }else{
                                                            //cargar formulario para añadir
                                                    ?>
                                                    <form name="frmAdd" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                        <label>Descripción: </label>
                                                        <input name="txtTp" type="text" required  />
                                                        <input type="hidden" name="btnAdd" value="Añadir">
                                                        <a href="pp.php" class="button special">Regresar</a>
                                                        <input class="special" value="Guardar" type="submit" >
                                                    </form>
                                                <?php
                                                        }
                                                    }else{
                                                ?>
                                                <form name="frmAdd" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                    <input name="btnAdd" class="special" value="Añadir Nuevo" type="submit" >
                                                </form> <br>
												<table class="rwd-table">
													<tr>
														<th>id</th>
														<th>Descripción</th>
														<th  colspan="2">Tareas</th>
													</tr>
                                                    <?php
                                                        //
                                                        $sql="SELECT id, descripcion FROM presentacionProducto;";
                                                        if($resultado = $con -> query($sql)){
                                                            while($obj = $resultado->fetch_object()){
                                                        ?>
                                                    <tr>
    													<td><?php echo $obj->id ; ?></td>
    													<td><?php echo $obj->descripcion ; ?></td>
														<td>
															<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                                <Button name="btnEditar" type="submit" value="<?php echo $obj->id; ?>">  Editar</button>
                                                            </form>
                                                        </td>

														<td><form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
                                                                <Button name="btnDel" type="submit" value="<?php echo $obj->id; ?>" >Eliminar</button>
                                                            </form>
                                                        </td>
  													</tr>
                                                                <?php
                                                            }
                                                        }
                                                    ?>


												</table>
                                                <?php }?>
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
