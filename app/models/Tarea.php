<?php

require_once __DIR__ . '/../core/Database.php';

class Tarea
{
    private static function conectar()
    {
        try {
            $host = 'db'; // El nombre del servicio en docker-compose
            $dbname = 'tareas';
            $usuario = 'root';
            $contrasena = 'clave123';

            $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function obtenerTodas()
    {
        $sql = "SELECT * FROM tareas";
        $stmt = self::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function crear($titulo, $descripcion)
    {
        $sql = "INSERT INTO tareas (titulo, descripcion) VALUES (:titulo, :descripcion)";
        $stmt = self::conectar()->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }

    public function crearTarea($titulo, $descripcion)
    {
        try {
            $conn = Database::connect();
            //$conn = new PDO('mysql:host=db;dbname=' . getenv('tareas'), 'root', getenv('clave123'));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO tareas (titulo, descripcion) VALUES (:titulo, :descripcion)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar tarea: " . $e->getMessage();
        }
    }

    public static function eliminar($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function obtenerPorId($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM tareas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar($id, $titulo, $descripcion)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$titulo, $descripcion, $id]);
    }
}
