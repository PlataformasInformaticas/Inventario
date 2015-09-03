<?php
    include "../conect.php";
    include "../comprusr.php";
	$sql = "SELECT descCompra.precio AS precio, descCompra.precioVenta AS precioVenta, Compra.fecha, Compra.id
FROM descCompra
INNER JOIN Compra ON descCompra.Compra_id = Compra.id
WHERE descCompra.Producto_id ="
			.$_GET['idP'].	" ORDER BY Compra.fecha DESC , Compra.id DESC
LIMIT 0 , 1";
	$precio= "0.00";
	$precioV= "0.00";
	if($resultado = $con -> query($sql)){
		if($obj = $resultado->fetch_object()){
			$precio= $obj->precio;
			$precioV= $obj->precioVenta;

		}
	}

?>
                                                    <label>Precio Unitario de Compra: </label>
													<input type="number" name="txtPC" required value="<?php echo $precio ?>"
														   onchange="validarDouble(this);" >
                                                    <br>
                                                    <label>Precio Unitario de Venta: </label>
													<input type="number" name="txtPV" required value="<?php echo $precioV ?>"
														   onchange="validarDouble(this);" >
