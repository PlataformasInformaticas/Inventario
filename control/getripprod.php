<?php
    include "../conect.php";
    include "../comprusr.php";

?>
                                                    <label class="custom-select">
                                                        <select name="slcPPDC" id="slcPPDC" onchange="CargarProducto(this.value,0)" required>
                                                            <option disabled selected value="0">Seleccione un Valor</option>
                                                            <?php
                                                                $sql = "SELECT presentacionProducto.id as id, presentacionProducto.descripcion as descripcion FROM Producto inner join presentacionProducto on presentacionProducto.id = Producto.presentacionProducto_id where Producto.tipoProd_id=".$_GET['id']." group by id order by descripcion asc;";
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
