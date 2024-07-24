<?php


namespace Funciones;

class Sesion
{
    public static function iniciar()
    {
        if (session_status()  !== PHP_SESSION_ACTIVE) {
            session_start();
            session_regenerate_id(true);
        }
    }
    public static function propagarUsuario($email, $usuario, $agencyName, $reference, $firstName, $lastName)
    {
        self::iniciar();
        $_SESSION["lastName"] = $lastName;
        $_SESSION["firstName"] = $firstName;
        $_SESSION["Reference"] = $reference;
        $_SESSION["AgencyName"] = $agencyName;
        $_SESSION["email"] = $email;
        $_SESSION["usuario"] = $usuario;
    }
    public static function logout()
    {
        self::iniciar();
        session_destroy();
    }
    public static function consultar()
    {
        self::iniciar();
        return $_SESSION;
    }
}
