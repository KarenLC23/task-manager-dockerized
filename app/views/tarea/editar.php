<h1>Editar Tarea</h1>
<form method="POST" action="/tarea/actualizar">
  <input type="hidden" name="id" value="<?= $tarea['id'] ?>">

  <label>Título:</label><br>
  <input type="text" name="titulo" value="<?= htmlspecialchars($tarea['titulo']) ?>" required><br><br>

  <label>Descripción:</label><br>
  <textarea name="descripcion" required><?= htmlspecialchars($tarea['descripcion']) ?></textarea><br><br>

  <button type="submit">Actualizar</button>
</form>
