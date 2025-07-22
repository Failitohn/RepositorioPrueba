
<?php 
include 'conexionproyecto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	echo "<script>
	var confirm = confirm('¿Desea buscar información sobre esta comida?');
	if (!confirm){
	window.history.back();	
	}
	</script>";
}

$idcomida = $_POST['idcomida'];


$buscar = "SELECT nombrecomida, descripcioncomida, preciocomida FROM Comidas WHERE idcomida = $idcomida";
$resultado = mysqli_query($conexion, $buscar);

if ($conexion->query($buscar)){	
if ($fila = $resultado->fetch_assoc()) {
        $mensaje = "Comida Encontrada Exitosamente";

        $nombre = urlencode($fila['nombrecomida']);
        $descripcion = urlencode($fila['descripcioncomida']);
        $precio = urlencode($fila['preciocomida']);
        $msg = urlencode($mensaje);

        header("Location: r.html?msg=$msg&nombre=$nombre&descripcion=$descripcion&precio=$precio");
    }
        exit();
}
else{
die("Error al intentar buscar la comida". $conexion->error);
}
	exit();

 ?>