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


$insert = "INSERT INTO Comidas (idcomida, nombrecomida, descripcioncomida, preciocomida) VALUES ('$idcomida', '$nombrecomida', '$descripcioncomida', '$preciocomida')";

if ($conexion->query($insert)) {

    $mensaje = "Comida se inserto correctamente";
    header("location: c.html?msg=". urlencode($mensaje));
    exit();
} else {
    die("Error al agregar la comida: " . $conexion->error);
    }
    exit();
}
?>