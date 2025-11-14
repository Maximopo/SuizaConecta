<?php

session_start();
include("conexion.php");


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'docente') {
    echo "<script>alert('No autorizado'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}

if (!isset($_FILES['archivo'])) {
    echo "<script>alert('No se envió archivo'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}

$archivo = $_FILES['archivo'];
$nombreOriginal = $archivo['name'];
$tmpPath = $archivo['tmp_name'];
$tamanio = $archivo['size'];
$error = $archivo['error'];

$maxSize = 8 * 1024 * 1024; // 8 MB
$allowedExt = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];
$allowedMime = [
    'application/pdf',
    'image/jpeg',
    'image/png',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
];

if ($error !== UPLOAD_ERR_OK) {
    echo "<script>alert('Error en la subida (código: $error).'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}

if ($tamanio > $maxSize) {
    echo "<script>alert('El archivo supera el tamaño máximo (8 MB).'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}

$ext = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
if (!in_array($ext, $allowedExt)) {
    echo "<script>alert('Extensión no permitida.'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}


$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $tmpPath);
finfo_close($finfo);

if (!in_array($mime, $allowedMime)) {
    echo "<script>alert('Tipo de archivo no permitido.'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
    exit();
}


$nombreSeguro = preg_replace("/[^A-Za-z0-9_\-\.]/", '_', $nombreOriginal);
$prefijo = time() . '_' . bin2hex(random_bytes(4));
$nombreFinal = $prefijo . '_' . $nombreSeguro;

// Crear carpeta uploads si no existe
$uploadDir = __DIR__ . '/SuizaConecta/php/php/uploads/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$destino = $uploadDir . $nombreFinal;

if (move_uploaded_file($tmpPath, $destino)) {
    $stmt = $conn->prepare("INSERT INTO archivos (nombre_original, nombre_guardado, path, uploaded_by) VALUES (?, ?, ?, ?)");
    $uploaded_by = $_SESSION['id'] ?? null;
    $relativePath = 'uploads/' . $nombreFinal;
    if ($stmt) {
        $stmt->bind_param("sssi", $nombreOriginal, $nombreFinal, $relativePath, $uploaded_by);
        $stmt->execute();
        $stmt->close();
    }
    echo "<script>alert('Archivo subido correctamente'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
} else {
    echo "<script>alert('Error al mover el archivo'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
}
?>
