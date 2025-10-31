<?php
// CONFIGURA AQUÍ el correo destino real:
$destino = "gpalianrios@gmail.com";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = $_POST['nombre'];
    $documento = $_POST['documento'];
    $correo    = $_POST['correo'];
    $telefono  = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $categoria = $_POST['categoria'];
    $tipo_bien = $_POST['tipo_bien'];
    $descripcion_bien = $_POST['descripcion_bien'];
    $monto     = $_POST['monto'];
    $tipo_reclamo = $_POST['tipo_reclamo'];
    $detalle   = $_POST['detalle'];
    $fecha     = $_POST['fecha'];
    $hoja      = $_POST['hoja'];
    // Adjuntos (no funcional en mail() nativo, solo muestra ejemplo)
    $archivo   = $_FILES['adjunto'];

    $mensaje =
        "Hoja de Reclamación: $hoja\nFecha: $fecha\n\n" .
        "Nombre: $nombre\nDocumento: $documento\nEmail: $correo\nTeléfono: $telefono\nDirección: $direccion\n" .
        "Categoría: $categoria\nTipo de bien: $tipo_bien\nDescripción bien: $descripcion_bien\nMonto: $monto\n" .
        "Tipo reclamo: $tipo_reclamo\n\nDetalle: $detalle\n";

    $headers = "From: $correo";

    mail($destino, "Libro de Reclamaciones: $hoja", $mensaje, $headers);
    echo "<h2>¡Gracias por enviar tu reclamo!</h2>";
} else {
    // Si accede directo
    header("Location: index.html");
}
?>
