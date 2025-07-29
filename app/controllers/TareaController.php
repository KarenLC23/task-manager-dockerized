<?php

require_once 'app/models/Tarea.php';

class TareaController
{
    public function index()
    {
        $tareas = Tarea::obtenerTodas();
        require_once 'app/views/tarea/index.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            Tarea::crear($titulo, $descripcion);
            header('Location: /tarea/index');
        } else {
            require_once 'app/views/tarea/crear.php';
        }
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            require_once './app/models/Tarea.php';
            $tareaModel = new Tarea();
            $tareaModel->crearTarea($titulo, $descripcion);

            // Redirigir al listado después de guardar
            header('Location: /tarea/index');
        }
    }

    public function eliminar($id)
    {
        Tarea::eliminar($id);
        header('Location: /tarea/index');
    }

    public function editar($id)
    {
        $tarea = Tarea::obtenerPorId($id);
        require 'app/views/tarea/editar.php';
    }

    public function actualizar()
    {
        if (isset($_POST['id'], $_POST['titulo'], $_POST['descripcion'])) {
            Tarea::actualizar($_POST['id'], $_POST['titulo'], $_POST['descripcion']);
            header('Location: /tarea/index');
        }
    }
}
