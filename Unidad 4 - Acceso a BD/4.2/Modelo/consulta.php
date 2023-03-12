<?php
class Consulta
{
    //Realiza un INSERT a la bbdd 
    public function insertarLibro($id, $titulo, $autor, $paginas)
    {
        //Obtiene la conexión
        require_once('../Modelo/conexion.php');
        $conexion = new Conexion();
        $pdoObject = $conexion->getConexion();
        //Prepara el INSERT
        $sql = "INSERT INTO libros (id, titulo, autor, paginas) VALUES (:id, :titulo, :autor, :paginas)";
        $sentencia = $pdoObject->prepare($sql);
        //Bindea los parámetros
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':autor', $autor);
        $sentencia->bindParam(':paginas', $paginas);
        try {
            //Prueba a realizar el insert y si es correcto retornará 1(1 affected rows->1 libro insertado)
            return $sentencia->execute();
        } catch (Exception $e) {
            //Si hay algun problema retorno un string con un error
            return "<span style='color:red;'>Error:¡Clave primaria duplicada!</span>";
        }
    }
    //Retorna un array con todos los libros
    public function cargarLibros()
    {
        //Obtiene la conexión
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        //Prepara el SELECT
        $sql = "SELECT * FROM libros";
        $resultado = $conexion->prepare($sql);
        //resultado obtiene el objeto PDO con los datos
        $resultado->execute();
        $rows = null;
        //Recorrer el PDO y guardar datos en array
        while ($fila = $resultado->fetch()) {
            $rows[] = $fila;
        }

        return $rows;
    }
    //Elimina un libro mediante el id
    public function eliminaLibro($id)
    {
        //Obtiene la conexión
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        //Ejecuta la instrucción
        $sql = "DELETE FROM libros WHERE id=$id";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
    }
    //retorna una tabla con los libros filtrados por titulo indicado por el user 
    function filtraLibros($titulo)
    {
        //Obtiene la conexión
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        //Prepara el SELECT
        $sql = "SELECT * FROM libros WHERE titulo LIKE '%$titulo%'";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        //recorre y gauda en array el PDO
        $rows = null;
        while ($fila = $resultado->fetch()) {
            // guardamos las filas en un array
            $rows[] = $fila;
        }
        return $rows;
    }
    //Actualiza los valores de un libro
    function updateLibro($id, $titulo, $autor, $paginas)
    {
        //Obtiene la conexión
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        //Ejecuta inistrucción
        $sql = "UPDATE libros SET titulo='$titulo', autor='$autor', paginas=$paginas WHERE id=$id";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
    }
}
