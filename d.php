<?php 

include 'conexionproyecto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>
            var confirmacion = confirm('¿Desea eliminar la comida?');
            if (!confirmacion) {
                window.history.back();
            }
          </script>";

$idcomida = $_POST['idcomida'];
$delete = "DELETE FROM Comidas WHERE idcomida = $idcomida"; 

if ($conexion->query($delete)) {
     //echo 'Comida eliminada';
    $mensaje = "Comida se eliminó correctamente";
    //aqui nos redirigimos a la pagina que deseamos
    header("location: d.html?msg=". urlencode($mensaje));
    exit();
} else {
    die("Error al eliminar la comida: " . $conexion->error);
    }
    exit();
}
?>