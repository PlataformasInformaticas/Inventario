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

//Añadir Compra
if(isset($_POST['btnSubDC'])){
	$sql="INSERT INTO `descCompra` (`cantidad`, `precio`, `precioVenta`, `Compra_id`, `Producto_id` )
	VALUES (".$_POST['txtCant'].", ".$_POST['txtPC'].", ".$_POST['txtPV'] .", ".$_POST['txtId'].", ".$_POST['slcPDC']." );";

        $con -> query($sql);

?>
<h3>
	Dato Añadido Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="lsProv" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
<?php
//editar Detalle Compra
}elseif(isset($_POST['editarDescCompra'])){
	if(isset($_POST['editarDescCompraFinish'])){
        //Consulta para editar
        $sql="UPDATE `descCompra` SET `cantidad`='".$_POST['txtCant']."', `precio`='".$_POST['txtPC']."', `precioVenta`='".$_POST['txtPV'] ."', `Producto_id`='".$_POST['slcPDC']."' WHERE `id`='".$_POST['editarDescCompra']."';";

        echo $sql;
        $con -> query($sql);

?>
<h3>
	Dato Añadido Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="lsProv" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
<?php
	}else{
		$sql="Select  descCompra.id as id,  descCompra.Producto_id  as Producto_id,  descCompra.cantidad as cantidad,
		descCompra.precio as precio,  descCompra.precioVenta as precioVenta,  Producto.tipoProd_id as idtipoProd, Producto.presentacionProducto_id as idpresentacionProducto_id
		From descCompra inner join Producto on Producto.id =  descCompra.Producto_id
		where  descCompra.id= ". $_POST['editarDescCompra'];
		$resultado = $con -> query($sql);
		$obj2 = $resultado->fetch_object();
?>
<form name="frmEditarDetCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="lsProv" value="Producto">
	<input type="hidden" name="editarDescCompra" value="<?php  echo $_POST['editarDescCompra']; ?>">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId']; ?>">
	<label>Tipo de Producto: </label>
	<label class="custom-select">
		<select name="slcTPDC" id="slcTPDC" onchange="CargarPresentacion(this.value,0);" required>
			<option disabled value="0">Seleccione un Valor</option>
			<?php
		$sql = "SELECT tipoProd.id as id, tipoProd.descripcion as descripcion, Producto.id as prodid FROM Producto inner join tipoProd on tipoProd.id = Producto.tipoProd_id group by id order by descripcion asc;";
		if($resultado = $con -> query($sql)){
			while($obj = $resultado->fetch_object()){

			?>

			<option <?php if($obj->id==$obj2->idtipoProd){echo "selected"; $idtip=$obj->id;} ?>  value="<?php echo $obj->id ; ?>"><?php echo $obj->descripcion ; ?></option>
			<?php
			}
		}
			?>
		</select>
	</label>
	<br>
	<label>Presentación del Producto: </label>
	<span id="PP">
        <label class="custom-select">
                                                        <select name="slcPPDC" id="slcPPDC" onchange="CargarProducto(this.value,0)" required>
                                                            <option disabled value="0">Seleccione un Valor</option>
                                                            <?php
                                                                $sql = "SELECT presentacionProducto.id as id, presentacionProducto.descripcion as descripcion, Producto.id as prodid FROM Producto inner join presentacionProducto on presentacionProducto.id = Producto.presentacionProducto_id where Producto.tipoProd_id=".$idtip." group by id order by descripcion asc;";

                                                                if($resultado = $con -> query($sql)){
                                                                    while($obj = $resultado->fetch_object()){

                                                            ?>
                                                            <option <?php if($obj->id==$obj2->idpresentacionProducto_id){echo "selected"; $idPP=$obj->id ;} ?>  value="<?php echo $obj->id ; ?>"><?php echo $obj->descripcion ; ?></option>
                                                            <?php
                                                                    }
                                                                }

                                                            ?>
                                                        </select>
                                                    </label>
	</span><br>
	<label>Producto: </label>
	<span id="PROD">
                                                    <label class="custom-select">
                                                        <select name="slcPDC" id="slcPPDC" onchange="CargarPrecioProducto(this.value,0)" required>
                                                            <option disabled  value="0">Seleccione un Valor</option>
                                                            <?php
                                                                $sql = "SELECT Producto.id as id, Producto.descripcion as descripcion FROM Producto  where Producto.tipoProd_id=".$idtip." and Producto.presentacionProducto_id=".$idPP." group by id order by descripcion asc;";
                                                                if($resultado = $con -> query($sql)){
                                                                    while($obj = $resultado->fetch_object()){

                                                            ?>
                                                            <option <?php if($obj->id==$obj2->Producto_id){echo "selected"; $idPP=$obj->id ;} ?>  value="<?php echo $obj->id ; ?>"><?php echo $obj->descripcion ; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>

                                                    </label>

	</span><br>
	<label>Cantidad</label>
	<input tipe="number" name="txtCant" placeholder="0" onchange="validarInt(this);" value="<?php echo $obj2->cantidad; ?>"  required >
	<br>
	<span id="Precios">
                                                    <label>Precio Unitario de Compra: </label>
													<input tipe="number" name="txtPC" required value="<?php echo $obj2->precio; ?>"
														   onchange="validarDouble(this);" >
                                                    <br>
                                                    <label>Precio Unitario de Venta: </label>
													<input tipe="number" name="txtPV" required value="<?php echo $obj2->precioVenta; ?>"
														   onchange="validarDouble(this);" >
	</span>
	<br>
	<input id="btnSubDC" name="editarDescCompraFinish" class="special" value="Editar" type="submit" >
</form>
<!-- fin Editar Detalle Compra -->
<?php
	}
}elseif(isset($_POST['EliminarDescCompra'])){ //Eliminar
}else{
?>
<!--Formulario Descripcion de compra - Añadir -->
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="lsProv" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $idCompra;?>">
	<label>Tipo de Producto: </label>
	<label class="custom-select">
		<select name="slcTPDC" id="slcTPDC" onchange="CargarPresentacion(this.value,0);" required>
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
	<label>Presentación del Producto: </label>
	<span id="PP">
	</span><br>
	<label>Producto: </label>
	<span id="PROD">
	</span><br>
	<label>Cantidad</label>
	<input tipe="number" name="txtCant" placeholder="0.00" onchange="validarDouble(this);"  required >
	<br>
	<span id="Precios">
	</span>
	<br>
	<input id="btnSubDC" name="btnSubDC" class="special" value="Añadir Producto" type="submit" disabled>
	<a href="compra.php" class="button special">Regresar</a>
</form>
<!--Empiza tabla -->
<br>
<br>
<h3>
	Descripción de Factura
</h3>
<table border="1" style="width:auto">
	<tr>
		<th>Id</th>
		<th>Número de Factura</th>
		<th>Fecha</th>
		<th>Nombre del Proveedor</th>
		<th>Dirección</th>
		<th>NIT</th>
		<th>Total</th>
	</tr>
	<?php
	  //
	  $sql="SELECT Compra.id as id, Compra.facN as facN ,  fecha, Proveedores.nombre as nombre,
	  Proveedores.direccion as direccion, Proveedores.nit as nit, Compra.total as total
	  FROM Compra inner join Proveedores on Proveedores.id = Compra.Proveedores_id
	  where Compra.id=" . $idCompra;
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

	</tr>
	<?php
		  }
	  }
	?>


</table>
<br>
<br>
<h3>
	Detalle de Factura
</h3>
<table border="1" style="width:auto">
	<tr>
		<th>Id</th>
		<th>Descripción</th>
		<th>Cantidad</th>
		<th>Precio Unitario de Compra</th>
		<th>Precio Unitario de Venta</th>
		<th>Subtotal</th>
                <th  colspan="2">Tareas</th>
	</tr>
	<?php
	  //
	  $sql="Select  descCompra.id as id,  Producto.descripcion as descripcion,  descCompra.cantidad as cantidad,
	  descCompra.precio as precio,  descCompra.precioVenta as precioVenta,  (descCompra.cantidad *  descCompra.precio) as subtotal
	  From descCompra inner join Producto on Producto.id =  descCompra.Producto_id
	  where  descCompra.Compra_id= ". $idCompra;


	  if($resultado = $con -> query($sql)){
		  while($obj = $resultado->fetch_object()){
	?>
	<tr>
		<td><?php echo $obj->id ; ?></td>
		<td><?php echo $obj->descripcion ; ?></td>
		<td><?php echo $obj->cantidad ; ?></td>
		<td><?php echo $obj->precio ; ?></td>
		<td><?php echo $obj->precioVenta ; ?></td>
		<td><?php echo $obj->subtotal ; ?></td>

		<td>

			<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
				<input type="hidden" name="btnAdd" value="Añadir">
				<input type="hidden" name="lsProv" value="Producto">
				<input type="hidden" name="txtId" value="<?php  echo $idCompra; ?>">
				<Button name="editarDescCompra" type="submit" value="<?php echo $obj->id; ?>">  Editar</button>
			</form>
		</td>

		<td>
			<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
				<input type="hidden" name="btnAdd" value="Añadir">
				<input type="hidden" name="lsProv" value="Producto">
				<input type="hidden" name="txtId" value="<?php  echo $idCompra;?>">
				<Button name="EliminarDescCompra" type="submit" value="<?php echo $obj->id; ?>" >Eliminar</button>
			</form>
		</td>
	</tr>
	<?php
		  }
	  }
	?>
</table>
<!--Termina Form de Detalle de Factura -->
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
														<input type="date" id="fecha" name="fecha" placeholder="aaaa-mm-dd" required onchange="validarFecha(this.value)"> <br>
														<label>Número de Factura</label>
														<input type="text" name="txtNfac" required>
														<label>Total Facturado</label>
														<input type="number" name="saldo" id="saldo" required placeholder="0.00" onchange="validarDouble(this);"   step="any" >
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
