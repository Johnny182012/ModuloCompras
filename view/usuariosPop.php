<!DOCTYPE html>

<!--Formulario que lista los usuarios ingresados en la base.-->
<?php
session_start();
require_once '../model/Producto.php';


?>
<script type="text/javascript">
function sumaDePares(nom) {        
            var nombreTabla = nom;        
            var valor1 = 0
            var suma=0
            $("#" + nombreTabla ).find(".sumtotal").each(function () {
                valor1 = $(this).val();              
                if (valor1 == '') {                    
                    valor1 = 0
                }
                valor1 = parseInt(valor1);                                    
                suma= parseInt(valor2);
               suma= suma+ valor1;             
            });
            $('#txtTotal').val(suma);               
        }
        </script>
        <script>

</script>
 <script type="text/javascript">
    $(document).ready(function(){
        $(".grupo").keyup(function()
        {
            var cantidad=$(this).find("input[name=cantidad]").val();
            var pvp=$(this).find("input[name=pvp]").val();
            $(this).find("input[name=total]").html(parseInt(cantidad)*parseInt(pvp));
 
            // calculamos el total de todos los grupos
            var total=0;
            $(".grupo .total").each(function(){
                total=total+parseInt($(this).html());
            })
            $(".total .total").html(total);
        });
    });
    </script>
    
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control - Usuarios</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <script> type="text/javascript" src="js/jquery-2.1.4.js"</script>
        <script type="text/javascript"> 
         
        </script>
    </head>
    <body>
        <div class="container">
         
            <div class="row">

            </div>
            
            <p>
           
        </p>
        <form name="factura">
        <div class="panel panel-info">
                <div class="panel-heading"> <b>LISTA DE PRODUCTOS</b></div>
                <div class="panel-body" id="contenedor">
                    <!--TABLA EN LA QUE LISTA LOS LOGIN INGRESADOS DESDE LA BASE-->
                    <table data-toggle="table">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>CALCULAR</th>
                                <th>PRECIO</th>
                                <th>IVA</th>
                                <th>TOTAL</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <Script language = "JavaScript">
                                function multiplicar()
                                    {
                                document.forms[0].total.value = eval(document.forms[0].cantidad.value) * eval(document.forms[0].pvp.value);
                                }
        </Script>
                            <?php
                            //verificamos si existe en sesion el listado de login:
                            
                            if (isset($_SESSION['listaProductos'])) {
                                $listado = unserialize($_SESSION['listaProductos']);
                                foreach ($listado as $prod) {
                                    $s=$prod->getPvpproducto();
                                    
                                    echo "<tr>";
                                    echo "<td>" . $prod->getIdproducto() . "</td>";
                                    echo "<td>" . $prod->getNombreproducto() . "</td>";
                                    echo "<td>" . "<input type='text' name='cantidad'>". "</td>";    
                                    //echo "<td>" . $s . "</td>";
                                    echo "<td>" . "<INPUT TYPE= 'BUTTON' NAME='BTN3' VALUE= '*' onclick='multiplicar()'>" . "</td>";
                                    echo "<td>" . "<input type='text'  name='pvp'  >". "</td>";    
                                    echo "<td>" . $prod->getIvaproducto() . "</td>";
                                //    echo "<td>" . $total. "</td>";
                                    echo "<td>" . "<input type='text' name='total' >". "</td>";    
                                    echo "<td><a href='../controller/controller.php?opcion=seleccionar_producto&idproducto=" . $prod->getIdproducto() . "'><span class='glyphicon glyphicon-pencil '> Seleccionar </span></a></td>";
                                    echo "</tr>";
                                    
                                }
                            } else {
                                echo "No se han cargado datos.";
                            }
                            ?>
        
        
                        </tbody>
                    </table>
                </div>
            </div>
            </form>
    </div>
    
</body>
</html>
