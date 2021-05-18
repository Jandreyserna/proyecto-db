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
  // $lugar = array_search('IdEstudiante', array_column($columnas, '0'));
  // $lugar2 = array_search('Idpromotor', array_column($columnas, '1'));
  $promotor = new Modelo_promotor();
  $info_promotor = $promotor->id_nombre_promotor();
  unset($columnas[0]);
  unset($columnas[1]);
  $info = $modelo_estudiantes->traer_datos();
  ?>

  <table class="display" id="tabla1">
  <thead>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>PROMOTOR</th>
      <th scope='col'>NOMBRES</th>
      <th scope='col'>APELLIDOS</th>
      <th scope='col'>info</th>
      <th scope='col'>actu</th>
      <th></th>
    </tr>

  </thead>
  <tbody>

      <?php
      if ($info != null) {
        for ($x=0; $x < sizeof($info); $x++) {
            echo  "<tr>";
            $n = 0;
            foreach ($info[$x] as $key => $dato) {
                      if($n < 6 ){
                      echo"<td>".$dato."</td>";
                    $n++;
                  } else if($n < 7){
                          $n++;
                          echo"<td>"."<button class='info_complete btn-outline-success' type='button' name='button_info'>".'Informacion'."</button>"."</td>";
                      }else if($n == 7){
                          $n++;
                          echo"<td>"."<button class='actualizar-estudiantes btn-outline-success' type='button' name='button_actualizar'>".'Actualizar'."</button>"."</td>";
                      }
                  }
              echo "</tr>";
      }

              }?>
  </tbody>
</table>
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
