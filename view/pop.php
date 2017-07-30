<HTML>
    <HEAD>
        <TITLE>CONFIGURANDO HTML
        </TITLE>
    </HEAD>

    <BODY>
        <Script language = "JavaScript">

            function sumar()
            {
                document.forms[0].nN3.value = eval(document.forms[0].nN1.value) + eval(document.forms[0].nN2.value);
            }

            function restar()
            {
                document.forms[0].nN3.value = eval(document.forms[0].nN1.value) - eval(document.forms[0].nN2.value);
            }

            function multiplicar()
            {
                document.forms[0].nN3.value = eval(document.forms[0].nN1.value) * eval(document.forms[0].nN2.value);
            }

            function dividir()
            {
                if (eval(document.forms[0].nN2.value) != 0)
                {
                    document.forms[0].nN3.value = eval(document.forms[0].nN1.value) / eval(document.forms[0].nN2.value);
                   
                } else
                {
                    alert("No divide por cero");
                }
            }
        </Script>

        <FORM ACTION= "mailto: msbianchi@latinmail.com" method= "post">
            Nº1:<INPUT TYPE="TEXT" NAME="nN12" SIZE="10">
            <BR>
            Nº2:<INPUT TYPE="TEXT" NAME="nN22" SIZE="10">
            <BR>
            RES:<INPUT TYPE="TEXT" NAME="nN32" SIZE="10" >
            <BR>
            <INPUT TYPE= "BUTTON" NAME="BTN1" VALUE= "+" ONCLICK= "sumar()"> 
            <INPUT TYPE= "BUTTON" NAME="BTN2" VALUE= "-" onclick= "restar()">
            <INPUT TYPE= "BUTTON" NAME="BTsN3" VALUE= "*" onclick= "multiplicar()">
            <INPUT TYPE= "BUTTON" NAME="BTN4" VALUE= "/" onclick= "dividir()">
            <INPUT TYPE= "SUBMIT" NAME="BTN5" VALUE= "ENVIAR">
            <BR> PRESIONE AQUÍ PARA ABRIR LA CALC<A HREF= "C:/WINDOWS/CALC.EXE"> ABRIR </A>
        </FORM>
        
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
                            <?php
                            session_start();
                            require_once '../model/Producto.php';

                            //verificamos si existe en sesion el listado de login:
                            
                            if (isset($_SESSION['listaProductos'])) {
                                $listado = unserialize($_SESSION['listaProductos']);
                                foreach ($listado as $prod) {
                                    $s=$prod->getPvpproducto();
                                    
                                    echo "<tr>";
                                    echo '<INPUT TYPE="TEXT" NAME="nN1" SIZE="10" value=0>';
                                    echo '<INPUT TYPE="TEXT" NAME="nN2" SIZE="10">';
                                    echo '<INPUT TYPE="TEXT" NAME="nN3" SIZE="10" >';
                                    echo '<INPUT TYPE= "BUTTON" NAME="BTN3" VALUE= "*" onclick= "multiplicar()">';
                                    
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

        
    </BODY>
</HTML>
