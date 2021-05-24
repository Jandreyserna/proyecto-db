<?php
if (!empty($_POST['ingresar_estudiante'])){
  ingresar_estudiante();
}
?>


<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>ADMINISTRACIÓN DE ESTUDIANTES</h1>
  </div>

  <?php
  $columnas = $modelo_estudiantes->columnas();
  $promotor = new Modelo_promotor();
  $tabla_estudiantes = new Modelo_estudiantes();
  $info_promotor = $promotor->id_nombre_promotor();
  unset($columnas[0]);
  unset($columnas[1]);
  $info = $modelo_estudiantes->traer_datos();
  $info_estudiante = $tabla_estudiantes->id_nombre_estudiante();
  // echo "<pre>";
  // print_r($info_promotor);
  // echo "</pre>";
  ?>

  <table class="display" id="tabla-estudiantes">
  <thead>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>PROMOTOR</th>
      <th scope='col'>NOMBRES</th>
      <th scope='col'>APELLIDOS</th>
      <th scope='col'>Borrar</th>
      <th scope='col'>Informacion</th>
    </tr>

  </thead>
  <tbody>

    <?php
    if ($info_estudiante != null) {
      for ($x=0; $x < sizeof($info_estudiante); $x++) {
          echo  "<tr>";
          foreach ($info_estudiante[$x] as $key => $dato) {
            echo"<td>".$dato."</td>";
          }
          echo"<td><button class='borrar-estudiante btn-outline-success' type='button' name='button_borrar'>Borrar</button></td>";
          echo"<td>"."<button class='info-estudiante btn-outline-success' type='button' name='button_informacion'>".'Informaciòn'."</button>"."</td>";
          echo "</tr>";
      }

    }?>


  </tbody>
</table>
</div>

<div class="ajax-student">

</div>

<div class="crudd">
  <button class="btn btn-outline-success" type="button" name="button">
  <div class="container">
    <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">Insertar Estudiante Nuevo</a>
  </div>
</button>
</div>

<div id="ident" class="collapse">
  <form action="" class="form-inline" method="post">
    <input type="hidden" name="tabla" value="estudiantes"/>
    <input  type="hidden" name="ingresar_estudiante" value="ingreso"/>

    <select class="id_promotor" name="IdPromotor" required>
      <option value="" disabled selected>Promotor</option>
         <?php foreach ($info_promotor as $columna=> $dato): ?>
            <option value="<?= $dato['IdPromotor'] ?>"> <?= $dato['Nombre'].' '.$dato['Apellido'] ?></option>
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
