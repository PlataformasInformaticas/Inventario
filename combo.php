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
        <script src="assets/js/cargarCombo.js"></script>
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
                                            <a href="combo.php"> Combos </a>
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
													<h3><strong>Combos</strong></h3>
												</header>
												<p>Aquí puedes ver las operaciones con Combos de productos, puedes ingresar tus Combos de productos, eliminar y modificar.</p>

                                                <?php
                                                    //editar


                                                    if(isset($_POST['editarCombo'])){
                                                        if(isset($_POST['txtEditar'])){
                                                            //guardar
                                                            $sql="UPDATE `Combo` SET `descripcion`='".$_POST['txtEditar']."',  precio=".$_POST['txtPrec']."  WHERE `id`='".$_POST['txtId']."';";
                                                            $con -> query($sql);
                                                    ?>
<h3>
	Dato Modificado Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
                                                    <?php
                                                        }else{
                                                            //cargar formulario para modificar

                                                        $sql="SELECT descripcion, precio FROM Combo where id='".$_POST['txtId']."'";
                                                        $resultado = $con -> query($sql);
                                                        $obj = $resultado->fetch_object();
                                                ?>
                                                    <form name="frmEditar" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                        <label>Descripción: </label>
                                                        <input name="txtEditar" type="text" value="<?php echo $obj->descripcion ; ?>"/>
                                                        <label>Precio: </label>
														<input type="number" name="txtPrec" id="txtPrec" value="<?php echo $obj->precio ; ?>" required placeholder="0.00" onchange="validarDouble(this);"   step="any" >
														<input type="hidden" name="txtDesc" value="Producto">
														<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId']; ?>">
														<br>
														<br>
                                                        <a href="combo.php" class="button special">Regresar</a>
                                                        <input class="special" name="editarCombo" value="Guardar" type="submit" >
                                                    </form>
                                                <?php
                                                        }
                                                    }elseif(isset($_POST['btnDel'])){
                                                        //eliminar
														 $sql="DELETE FROM  `Combo` WHERE `id`='".$_POST['btnDel']."';";
                                                            $con -> query($sql);
                                                    ?>
                                                            <a href="combo.php" class="button special">Datos eliminados. Regresar</a>
                                                    <?php
                                                        //añadir
                                                    }elseif(isset($_POST['btnAdd'])){
                                                        if(isset($_POST['txtDesc'])){//
                                                            //guardar
															if(!(isset($_POST['showFRMdet']))){
																$sql="INSERT INTO `Combo` (`descripcion`, `precio`)
																	VALUES ('".$_POST['txtDesc']."', ".$_POST['txtPrec'].");";
                                                            	$con -> query($sql);
                                                                $sql= 'SELECT LAST_INSERT_ID() as id;' ;
                                                                $resultado = $con -> query($sql);
                                                        		$obj = $resultado->fetch_object();
                                                                $idCombo = $obj->id;
															}else{
                                                                if(!(isset($idCombo))){
                                                                    $idCombo = $_POST['txtId'];
                                                                }
                                                            }

//Añadir Elemento a Combo
if(isset($_POST['btnSubDC'])){
	//$sql="INSERT INTO `descCompra` (`cantidad`,   `Compra_id`, `Producto_id` )
	$sql="INSERT INTO `contCombo` (`cantidad`, `Producto_id`, `Combo_id` )
	VALUES (".$_POST['txtCant'].", ".$_POST['slcPDC'].",  ".$_POST['txtId']."  );";

        $con -> query($sql);

?>
<h3>
	Dato Añadido Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
<?php
//editar Detalle Compra
}elseif(isset($_POST['editarDescCombo'])){
	if(isset($_POST['editarDescComboFinish'])){
        //Consulta para editar
        $sql="UPDATE `contCombo` SET `cantidad`='".$_POST['txtCant']."', `Producto_id`='".$_POST['slcPDC']."' WHERE `id`='".$_POST['editarDescCombo']."';";
        $con -> query($sql);

?>
<h3>
	Dato Añadido Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
<?php
	}else{
		$sql="Select  contCombo.id as id,  contCombo.Producto_id  as Producto_id,  contCombo.cantidad as cantidad,
			Producto.tipoProd_id as idtipoProd, Producto.presentacionProducto_id as idpresentacionProducto_id
			From contCombo inner join Producto on Producto.id =  contCombo.Producto_id
			where  contCombo.id= ". $_POST['editarDescCombo'];
		$resultado = $con -> query($sql);
		$obj2 = $resultado->fetch_object();
?>
<form name="frmEditarDetCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="editarDescCombo" value="<?php  echo $_POST['editarDescCombo']; ?>">
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
                                                        <select name="slcPDC" id="slcPPDC" onchange="Habilitar(this.value)" required>
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
	<input type="number" name="txtCant" placeholder="0" onchange="validarInt(this);" value="<?php echo $obj2->cantidad; ?>"  required >
	<br>

	<br>
	<input id="btnSubDC" name="editarDescComboFinish" class="special" value="Editar" type="submit" >
</form>
<!-- fin Editar Detalle Compra -->
<?php
	}
}elseif(isset($_POST['EliminarDescCombo'])){ //Eliminar
	$sql="DELETE FROM  `contCombo` WHERE `id`='".$_POST['EliminarDescCombo']."';";
	$con -> query($sql);
?>
	<h3>
	Dato Eliminado Correctamente
</h3>
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $_POST['txtId'];?>">
	<input name="showFRMdet" class="special" value="Regresar" type="submit" >
</form>
<?php
}else{
?>
<!--Formulario Descripcion de compra - Añadir -->
<form name="frmaddDescCompra" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
	<input type="hidden" name="btnAdd" value="Añadir">
	<input type="hidden" name="txtDesc" value="Producto">
	<input type="hidden" name="txtId" value="<?php  echo $idCombo;?>">
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
	<input type="number" name="txtCant" placeholder="0" onchange="validarDouble(this);"  required >
	<br>

	<br>
	<input id="btnSubDC" name="btnSubDC" class="special" value="Añadir Producto" type="submit" disabled>
	<a href="combo.php" class="button special">Regresar</a>
</form>
<!--Empiza tabla -->
<br>
<br>
<h3>
	Descripción del Combo
</h3>
<table class="rwd-table" >
	<tr>
		<th>Id</th>
		<th>Descripción</th>
		<th>Precio</th>
		<th>Tareas</th>
	</tr>
	<?php
	  //
	  $sql="SELECT Combo.id as id, Combo.descripcion as descripcion, Combo.precio as precio
	  	FROM Combo  where Combo.id=" . $idCombo;
	  if($resultado = $con -> query($sql)){
		  while($obj = $resultado->fetch_object()){
	?>
	<tr>
		<td><?php echo $obj->id ; ?></td>
		<td><?php echo $obj->descripcion ; ?></td>
		<td><?php echo $obj->precio ; ?></td>
		<td>
			<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
				<input type="hidden" name="btnAdd" value="Añadir">
				<input type="hidden" name="txtDesc" value="Producto">
				<input type="hidden" name="txtId" value="<?php  echo $idCombo; ?>">
				<Button name="editarCombo" type="submit" value="<?php echo $idCombo; ?>">  Editar</button>
			</form>

		</td>

	</tr>
	<?php
		  }
	  }
	?>


</table>
<br>
<br>
<h3>
	Contenido del Combo
</h3>
<table class="rwd-table" >
	<tr>
		<th>Id</th>
		<th>Descripción</th>
		<th>Cantidad</th>
		<th  colspan="2">Tareas</th>
	</tr>
	<?php
	  //
	  $sql="Select  contCombo.id as id,  Producto.descripcion as descripcion,  contCombo.cantidad as cantidad
	  	From contCombo inner join Producto on Producto.id =  contCombo.Producto_id
	  	where  contCombo.Combo_id= ". $idCombo;


	  if($resultado = $con -> query($sql)){
		  while($obj = $resultado->fetch_object()){
	?>
	<tr>
		<td><?php echo $obj->id ; ?></td>
		<td><?php echo $obj->descripcion ; ?></td>
		<td><?php echo $obj->cantidad ; ?></td>
		<td>

			<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
				<input type="hidden" name="btnAdd" value="Añadir">
				<input type="hidden" name="txtDesc" value="Producto">
				<input type="hidden" name="txtId" value="<?php  echo $idCombo; ?>">
				<Button name="editarDescCombo" type="submit" value="<?php echo $obj->id; ?>">  Editar</button>
			</form>
		</td>

		<td>
			<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" onsubmit="return confirm('Desea Eliminar este producto del Combo\nsi lo hace podría desbalancear su inventario.');">
				<input type="hidden" name="btnAdd" value="Añadir">
				<input type="hidden" name="txtDesc" value="Producto">
				<input type="hidden" name="txtId" value="<?php  echo $idCombo;?>">
				<Button name="EliminarDescCombo" type="submit" value="<?php echo $obj->id; ?>" >Eliminar</button>
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
												?>
                                                    <form name="frmaddCombo" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                        <label>Descripción: </label>
														<input type="text" name="txtDesc" required>
														<label>Precio: </label>
														<input type="number" name="txtPrec" id="txtPrec" required placeholder="0.00" onchange="validarDouble(this);"   step="any" >
														<br>
                                                        <br>
                                                        <input type="hidden" name="btnAdd" value="Añadir">
                                                        <a href="combo.php" class="button special">Regresar</a>
                                                        <input class="special" value="Guardar" type="submit" >
                                                    </form>
                                                <?php

                                                        }
                                                    }else{
                                                ?>
                                                <form name="frmAdd" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                                    <input name="btnAdd" class="special" value="Añadir Nuevo" type="submit" >
                                                </form> <br>
												<table class="rwd-table" >
													<tr>
														<th>Id</th>
														<th>Descripción</th>
														<th>Precio</th>
                                                        <th  colspan="2">Tareas</th>
													</tr>
                                                    <?php
                                                        //
                                                        $sql="SELECT Combo.id as id, Combo.descripcion as descripcion, Combo.precio as precio FROM Combo;";
                                                        if($resultado = $con -> query($sql)){
                                                            while($obj = $resultado->fetch_object()){
                                                        ?>
                                                    <tr>
    													<td><?php echo $obj->id ; ?></td>
    													<td><?php echo $obj->descripcion ; ?></td>
                                                        <td><?php echo $obj->precio ; ?></td>

														<td>
															<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
																<input type="hidden" name="btnAdd" value="Añadir">
																<input type="hidden" name="txtDesc" value="Producto">
																<input type="hidden" name="txtId" value="<?php  echo $obj->id;?>">
                                                                <Button name="showFRMdet" type="submit" value="<?php echo $obj->id; ?>">  Editar</button>
                                                            </form>
                                                        </td>

														<td><form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" onsubmit="return confirm('Desea Eliminar este combo\nsi lo hace podría desbalancear su inventario.');">
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
