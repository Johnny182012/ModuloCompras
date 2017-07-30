<?php
 include_once '../model/Database.php';
      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            $pdo = Database::connect();
            $sql = ("select * from facturas where nombreproveedor LIKE '%".$b."%',$pdo");          
            $resultado = $pdo->query($sql);
            //transformamos los registros en objetos:
            $listado = array(); 
            $contar=0;
            foreach ($resultado as $res) {
                $contar++;
            }
            
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                foreach ($listado as $res){
                        $nombre = $row['nombreproveedor'];
                        $id = $row['idproveedor'];
                         
                        echo $id." - ".$nombre."<br /><br />";    
                  }
            }
      }
       
?>
