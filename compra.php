<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Asomol - Productos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <script src="assets/js/cargarCompra.js"></script>
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
                                            <a href="compra.php"> Compras </a>
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
													<h3><strong>Compras</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con Compras de productos, puedes ingresar tus compras de productos, eliminar y modificar.</p>
												<p>
                                                <?php
                                                    //editar


                                                    if(isset($_POST['btnEditar'])){
                                                        if(isset($_POST['txtEditar'])){
                                                            //guardar
                                                            $sql="UPDATE `presentacionProducto` SET `descripcion`='".$_POST['txtEditar']."' WHERE `id`='".$_POST['btnEditar']."';";
                                                            $con -> query($sql);
                                                    ?>
                                                    <a href="compra.php" class="button special">Datos Guardados. Regresar</a>
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
                                                        <label>Tipo de Producto: </label>


                                                        <select name="tipoProd">
                        <?php foreach ($rows as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';
                        }?>
                    </select>


                                                        <input name="txtEditar" type="text" value="<?php echo $obj->descripcion ; ?>"/>
                                                        <label>Presentacion de Producto: </label>
                                                        <input name="txtEditar" type="text" value="<?php echo $obj->descripcion ; ?>"/>
                                                        <input type="hidden" name="btnEditar" value="<?php echo $_POST['btnEditar'];?>">
                                                        <a href="compra.php" class="button special">Regresar</a>
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
                                                            <a href="compra.php" class="button special">Datos eliminados. Regresar</a>
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
                                                            <a href="compra.php" class="button special">Regresar</a>
                                                            <input class="special" value="Guardar" type="submit" >

                                                        </form>
                                                    <?php
                                                        }
                                                        //añadir
                                                    }elseif(isset($_POST['btnAdd'])){
                                                        if(isset($_POST['lsProv'])){
                                                            //guardar
															if(!(isset($_POST['showFRMdet']))){
																$sql = "select id from Proveedores where nit ='" . $_POST['lsProv']."';";
																$resultado = $con -> query($sql);
                                                        		$obj = $resultado->fetch_object();
																$sql="INSERT INTO `Compra` (`fecha`, `total`, `Proveedores_id`, `facN` )
																	VALUES ('".$_POST['fecha']."', ".$_POST['saldo'].", ".$obj->id .", '".$_POST['txtNfac']."' );";
                                                            	$con -> query($sql);
                                                                $sql= 'SELECT LAST_INSERT_ID() as id;' ;
                                                                $resultado = $con -> query($sql);
                                                        		$obj = $resultado->fetch_object();
                                                                $idCompra = $obj->id;
															}else{
                                                                if(!(isset($idCompra))){
                                                                    $idCompra = $_POST['txtId'];
                                                                }
                                                            }
                                                            //editar Detalle Compra
                                                            if(isset($_POST['editarDescCompra'])){
                                                            }elseif(isset($_POST['EliminarDescCompra'])){ //Eliminar
                                                            }else{
                                                ?>
                                                <form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                    <input type="hidden" name="btnAdd" value="Añadir">
                                                    <input type="hidden" name="lsProv" value="Producto">
                                                    <input type="hidden" name="txtId" value="<?php  echo $idCompra?>">
                                                    <label>Tipo de Producto</label>
                                                    <label class="custom-select">
                                                        <select name="slcTPDC" id="slcTPDC" onchange="CargarPresentacion(this.value);" required>
                                                            <option disabled selected value="0">Seleccione un Valor</option>
                                                            <?php
                                                                $sql = "SELECT tipoProd.id as id, tipoProd.descripcion as descripcion FROM Producto inner join tipoProd on tipoProd.id = Producto.tipoProd_id group by id order by descripcion asc;";
                                                                if($resultado = $con -> query($sql)){
                                                                    while($obj = $resultado->fetch_object()){

                                                            ?>
                                                            <option  value="<?php echo $obj->id ; ?>"><?php echo $obj->descripcion ; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </label>
                                                    <br>
                                                    <label>Presentación del Producto</label>
                                                    <span id="PP">
                                                    </span><br>
                                                    <label>Producto</label>
                                                    <span id="PROD">
                                                    </span><br>
                                                    <label>Cantidad</label>
                                                    <br>
                                                    <label>Precio de Compra</label>
                                                    <br>
                                                    <label>Precio de Venta</label>
                                                    <br>
                                                    <input id="btnSubDC" class="special" value="Guardar" type="submit" disabled>
                                                </form>
                                                            <a href="compra.php" class="button special">Datos Guardados. Regresar</a>
                                                    <?php
                                                            }


                                                    ?>

                                                    <?php
                                                        }else{
                                                            //cargar formulario para añadir
                                                            $sql = "select id, nit from Proveedores;";
                                                            if($resultado = $con -> query($sql)){

                                                    ?>
                                                    <form name="frmaddCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                        <label>Nit Proveedor: </label>
                                                        <input list="nits" name="lsProv" required>
                                                            <datalist id="nits">
                                                                <?php
                                                                while($obj = $resultado->fetch_object()){

                                                                ?>
                                                                <option value="<?php echo $obj->nit ; ?>">
                                                                <?php
                                                                }
                                                                ?>

                                                        	</datalist>
														<br>
														<label>Fecha: </label>
														<input type="date" name="fecha" placeholder="aaaa-mm-dd" required> <br>
														<label>Número de Factura</label>
														<input type="text" name="txtNfac" required>
														<label>Total Facturado</label>
														<input type="number" name="saldo" id="saldo"  step="any" >
														<br>
                                                        <br>
                                                        <input type="hidden" name="btnAdd" value="Añadir">
                                                        <a href="compra.php" class="button special">Regresar</a>
                                                        <input class="special" value="Guardar" type="submit" >
                                                    </form>
                                                <?php
                                                            }
                                                        }
                                                    }else{
                                                ?>
                                                <form name="frmAdd" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                    <input name="btnAdd" class="special" value="Añadir Nuevo" type="submit" >
                                                </form> <br>
												<table border="1" style="width:auto">
													<tr>
														<th>Id</th>
														<th>Número de Factura</th>
														<th>Fecha</th>
                                                        <th>Nombre del Proveedor</th>
                                                        <th>Dirección</th>
                                                        <th>NIT</th>
                                                        <th>Total</th>
                                                        <th  colspan="2">Tareas</th>
													</tr>
                                                    <?php
                                                        //
                                                        $sql="SELECT Compra.id as id, Compra.facN as facN ,  fecha, Proveedores.nombre as nombre, Proveedores.direccion as direccion, Proveedores.nit as nit, Compra.total as total FROM Compra inner join Proveedores on Proveedores.id = Compra.Proveedores_id;";
                                                        if($resultado = $con -> query($sql)){
                                                            while($obj = $resultado->fetch_object()){
                                                        ?>
                                                    <tr>
    													<td><?php echo $obj->id ; ?></td>
    													<td><?php echo $obj->facN ; ?></td>
                                                        <td><?php echo $obj->fecha ; ?></td>
                                                        <td><?php echo $obj->nombre ; ?></td>
                                                        <td><?php echo $obj->direccion ; ?></td>
                                                        <td><?php echo $obj->nit ; ?></td>
                                                        <td><?php echo $obj->total ; ?></td>

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
