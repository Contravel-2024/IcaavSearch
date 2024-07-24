<?php

namespace Funciones;

use Illuminate\Support\Facades\Log;

class SYBASE
{

    public static function obtenerFormasPagos()
    {
        error_log("Iniciando la función obtenerFormasPagos"); // Depuración

        $bd = BD::obtenerSybase();
        if (!$bd) {
            return "CONEXION FALLIDA";
        }

        $query = "SELECT * FROM dba.view_gvc_reporteador WHERE gvc_fecha = '2024-04-29 00:00:00.000'";
        $result = odbc_exec($bd, $query);
        if (!$result) {
            $error = odbc_errormsg($bd);
            error_log("Error en la consulta: " . $error); // Depuración
            odbc_close($bd);
            return "ERROR EN LA CONSULTA: " . $error;
        }

        $data = self::fetchDataFromResult($result);
        odbc_close($bd);

        return $data;
    }

    private static function fetchDataFromResult($result)
    {
        $data = [];
        while ($row = odbc_fetch_array($result)) {
            // Convertir cada valor a UTF-8 y manejar caracteres inválidos
            foreach ($row as &$value) {
                $value = iconv('UTF-8', 'UTF-8//IGNORE', $value);
            }
            // Agregar la fila convertida al array $data
            $data[] = $row;
        }

        // Codificar los datos a JSON
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
        if ($jsonData === false) {
            return "Error al codificar los datos JSON: " . json_last_error_msg();
        }

        return $jsonData;
    }
}
