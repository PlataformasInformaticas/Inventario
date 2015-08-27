<?php
    include "../conect.php";
    include "../comprusr.php";
	$sql = "SELECT Top 1 descCompra.precio as precio, Producto.precioVenta as precioVenta, Compra.fecha, Compra.id
			FROM descCompra inner join Compra on descCompra.Compra_id = Compra.id where descCompra.Producto_id="
			.$_GET['idP'].	" order by Compra.fecha desc, Compra.id ;";

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
													<input tipe="number" name="txtPC" required value="<?php echo $precio ?>"
														   onchange="validarDouble(this);" >
                                                    <br>
                                                    <label>Precio Unitario de Venta: </label>
													<input tipe="number" name="txtPV" required value="<?php echo $precioV ?>"
														   onchange="validarDouble(this);" >
