<?php
if (!empty($_POST['ingresar_curso'])){
    unset($_POST['ingresar_curso']);
  ingresar_curso();
}
?>

<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE CURSOS</h1>
</div>

<?php
  $columnas = $modelo_cursos->columnas();
  $libro = new Modelo_libro();
  $info_libro = $libro->id_nombre_libro();
  $profesor = new Modelo_profesor();
  $info_profesor = $profesor->id_nombre_profesor();
  unset($columnas[0]);
  unset($columnas[1]);
  unset($columnas[2]);
  $cursos = new Modelo_cursos();
  $info = $cursos-> informacion_tabla();
  // echo "<pre>";
  // print_r($info);
  // echo "</pre>";
?>

<table class="display" id="tabla-cursos">
<thead>
  <tr>
    <th scope='col'>ID</th>
    <th scope='col'>PROFESOR</th>
    <th scope='col'>NOMBRE</th>
    <th scope='col'>MATERIAL</th>
    <th scope='col'>Borrar</th>
    <th scope='col'>Informacion</th>
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
          echo"<td><button class='borrar-curso btn-outline-success' type='button' name='button_borrar'>Borrar</button></td>";
          echo"<td>"."<button class='info-curso btn-outline-success' type='button' name='button_actualizar'>".'Informaciòn'."</button>"."</td>";
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
    <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">Insertar Curso Nuevo</a>
  </div>
</button>
</div>

<div id="ident" class="collapse">
  <form action="" class="form-inline" method="post">
    <input  type="hidden" name="ingresar_curso" value="ingreso"/>

    <select class="id_profesor" name="IdProfesor" required>
      <option value="" disabled selected>Profesor</option>
         <?php foreach ($info_profesor as $columna=> $dato): ?>
            <option value="<?= $dato['IdProfesor'] ?>"> <?= $dato['Nombre'].' '.$dato['Apellidos'] ?></option>
         <?php endforeach; ?>
    </select>
    <select class="id_libro" name="IdLibro" required>
      <option value="" disabled selected>Libro</option>
         <?php foreach ($info_libro as $colum=> $data): ?>
            <option value="<?= $data['IdLibro'] ?>"> <?= $data['Nombre'] ?></option>
         <?php endforeach; ?>
    </select>
<?php
      foreach ($columnas as $nombre) {
        if($nombre['COLUMN_NAME'] == 'fecha_inicio' OR $nombre['COLUMN_NAME'] == 'fecha_fin'){
?>
          <p>
            <label for="campo1"><?php echo $nombre['COLUMN_NAME']; ?> </label>
            <input type="date" id="campo1" name="<?php  echo $nombre['COLUMN_NAME'] ?>" placeholder="Inserta un dato"/>
          </p>
<?php
            }else{
?>
          <p>
            <label for="campo1"><?php echo $nombre['COLUMN_NAME']; ?> </label>
            <input type="text" id="campo1" name="<?php  echo $nombre['COLUMN_NAME'] ?>" placeholder="Inserta un dato"/>
          </p>
<?php
            }
      }


      ?>
    <input  type="submit" value="Enviar"/>
  </form>
</div>
