<?php 
include 'conexionproyecto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>
            var confirmacion = confirm('¿Desea agregar la comida?');
            if (!confirmacion) {
                window.history.back();
            }
          </script>";

$idcomida = $_POST['idcomida'];
$nombrecomida = $_POST['nombrecomida'];
$descripcioncomida = $_POST['descripcioncomida'];
$preciocomida = $_POST['preciocomida'];

$update = "UPDATE Comidas SET idcomida='$idcomida', nombrecomida='$nombrecomida', descripcioncomida='$descripcioncomida', preciocomida='$preciocomida' WHERE idcomida = '$idcomida'";

if($conexion->query($update)) {

    $mensaje = "Comida se actualizo correctamente";
    header("location: u.html?msg=". urlencode($mensaje));
    exit();
} else {
    die("Error al actualizar la comida: " . $conexion->error);
    }
    exit();
}
?>