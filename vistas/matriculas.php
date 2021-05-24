
<?php
if (!empty($_POST['ingresar_matricula'])){
    // unset($_POST['ingresar_curso']);
  ingresar_curso();
}
?>

<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE MATRICULADOS</h1>
</div>

<?php
  $columnas = $modelo_estudiantes->columnas();
  unset($columnas[0]);
  unset($columnas[1]);
  $curso = new Modelo_cursos();
  $matricula = new Modelo_matricula();
  $info_curso = $curso->id_nombre_curso();
  $estudiante = new Modelo_estudiantes();
  // $info_estudiante = $estudiante->id_nombre_profesor();
  $info = $matricula-> informacion_tabla();
?>

<table class="display" id="tabla-matricula">
<thead>
  <tr>
    <th scope='col'>CURSO</th>
    <th scope='col'>PROFESOR</th>
    <th scope='col'>NOTA</th>
    <th scope='col'>INFORMACIÓN</th>
  </tr>

</thead>
<tbody>

    <?php
    if ($info != null) {
      for ($x=0; $x < sizeof($info); $x++) {
          echo  "<tr>";
          foreach ($info[$x] as $key => $dato) {
            echo"<td>".$dato."</td>";
          }

          echo"<td>"."<button class='info-matricula btn-outline-success' type='button' name='button_actualizar'>".'Informaciòn'."</button>"."</td>";
          echo "</tr>";
      }

    }?>
</tbody>
</table>

<div class="resultado-informacion">

</div>

<div class="crudd">
  <button class="btn btn-outline-success" type="button" name="button">
  <div class="container">
    <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">Matricular Estudiante</a>
  </div>
</button>
</div>

<div id="ident" class="collapse">
  <form action="" class="form-inline" method="post">
    <input  type="hidden" name="ingresar_curso" value="ingreso"/>
    <label for="campo1">Cursos</label>
    <select class="id_curso" name="IdCurso" required>
      <option value="" disabled selected>Curso</option>
         <?php foreach ($info_curso as $columna=> $dato): ?>
            <option value="<?= $dato['IdCurso'] ?>"> <?= $dato['Nombre'] ?></option>
         <?php endforeach; ?>
    </select>
<?php
      foreach ($columnas as $nombre) {

?>
          <p>
            <label for="campo1"><?php echo $nombre['COLUMN_NAME']; ?> </label>
            <input type="text" id="campo1" name="<?php  echo $nombre['COLUMN_NAME'] ?>" placeholder="Inserta un dato"/>
          </p>
<?php

            }



      ?>
    <input  type="submit" value="Enviar"/>
  </form>
</div>
