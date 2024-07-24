<?php
# Nota: establece esta variable en true cuando vayas a pasar a producción, tanto por seguridad
# como porque el sistema fallará si no lo haces, ya que no habrá HTTP_ORIGIN
$produccion = false;
if (!$produccion) {
    // Verificar si existe HTTP_ORIGIN en la solicitud
    $dominioPermitido = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '*';

    // Permitir acceso desde cualquier origen durante el desarrollo
    header("Access-Control-Allow-Origin: $dominioPermitido");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Credentials: true");

    // Si es una solicitud OPTIONS, termina aquí
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        exit;
    }
}
