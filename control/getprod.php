<?php
    include "../conect.php";
    include "../comprusr.php";

?>
                                                    <label class="custom-select">
                                                        <select name="slcPDC" id="slcPPDC" onchange="CargarPrecioProducto(this.value,0)" required>
                                                            <option disabled selected value="0">Seleccione un Valor</option>
                                                            <?php
                                                                $sql = "SELECT Producto.id as id, Producto.descripcion as descripcion FROM Producto  where Producto.tipoProd_id=".$_GET['idTP']." and Producto.presentacionProducto_id=".$_GET['idPP']." group by id order by descripcion asc;";
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
