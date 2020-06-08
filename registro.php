<a href="index.php">index</a> |
<a href="registro.php">registrar</a> |
<a href="faltantes.php">faltantes</a>

<form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
    <input type="text" name="nro" required="required" placeholder="ingrese nro">
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $nro = $_POST["nro"];
    include 'pdo.php';
    
    try{
        $sql = "INSERT INTO figuras(numero) VALUES ($nro)";
        $result = $conn->exec($sql);
        if($result!=0){
            echo "Figura registrada";
        }else{
            echo "No se pudo guardar";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    
}


