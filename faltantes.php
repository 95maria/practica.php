
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <a href="index.php">index</a> |
        <a href="registro.php">registrar</a> |
        <a href="faltantes.php">faltantes</a>
       

        <?php
        for($i=1;$i<=669;$i++){
            if($i==23){
                echo "<span style='color: '>$i</span>";
            }else{
                echo $i." ";
            }
            
            if(($i%20)==0){
                echo "<br>";
            }            
        }
        ?>
        
        <table border="1" cellspacing="0">
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
            
            if($cont!=true){
                echo "<td align='center'>$i</td>";
            }else
                echo "<td>&nbsp</td>";
            
            
            if(($i%20)==0){
                echo "</tr><tr>";
            }            
        }    
        
        function traerFigurasRegistradas(){
            include 'pdo.php';
            $result = null;
            
            try{
                $sql = "SELECT * FROM figuras";
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
