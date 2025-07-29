<h2>Crear nueva tarea</h2>

<form action="/tarea/store" method="POST">
  <label for="titulo">Título:</label><br>
  <input type="text" name="titulo" required><br><br>

  <label for="descripcion">Descripción:</label><br>
  <textarea name="descripcion" required></textarea><br><br>

  <button type="submit">Guardar tarea</button>
</form>
