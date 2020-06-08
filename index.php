<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
  
        <a href="index.php">index</a> |
        <a href="registro.php">registrar</a> |
        <a href="faltantes.php">faltantes</a>
        
        <?php
//        for($i=1;$i<=100;$i++){
//            if($i==23){
//                echo "<span style='color: green'>$i</span>";
//            }else{
//                echo $i." ";
//            }
//            
//            if(($i%10)==0){
//                echo "<br>";
//            }            
//        }
        ?>
        
        <table border="1"  cellspacing="0" background-color: red >
        <?php
        for($i=1;$i<=669;$i++){
            if($i==1){
                echo "<tr>";
            }
            $cont=false;
            
            $results = traerFigurasRegistradas();            
            foreach($results as $figura){
                if($i == $figura["numero"]){
                    $cont=true;
                }
            }               
            
            if($cont==true){
                echo "<td style='background-color: yellow' align='center'>$i</td>";
            }else{
                echo "<td align='center'>$i</td>";
            }   
            
            if(($i%20)==0){
                echo "</tr><tr>";
            }           
        }       
        
        function traerFigurasRegistradas(){
            include 'pdo.php';
            $result = null;
            
            try{
                $sql = "SELECT * FROM album";
                $result = $conn->query($sql);                
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
            
            return $result;
        }
        ?>
        </table>
    </body>
</html>
