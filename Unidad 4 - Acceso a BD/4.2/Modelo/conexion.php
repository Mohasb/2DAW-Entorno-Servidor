<?php
class Conexion
{
    //Retorna una instancia de PDO con la conexión
    public function getConexion()
    {
        $host = "localhost";
        $db = "bdlibros";
        $user = "root";
        $pass = "";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
        return $conexion;
    }
}
