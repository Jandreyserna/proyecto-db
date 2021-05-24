<?php
if (!empty($_POST['ingresar_evento'])){
  ingresar_evento();
}
?>


<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>ADMINISTRACIÓN DE EVENTOS</h1>
  </div>

  <?php
  $libro = new Modelo_libro();
  $modelo_general = new Modelo_general('lb_eventos');
  $columnas = $modelo_general->columnas();
  $tabla_eventos = new Modelo_eventos();
  $info_libro = $libro->id_nombre_libro();
  unset($columnas[0]);
  unset($columnas[1]);
  $info = $modelo_general->traer_datos();
  $info_evento = $tabla_eventos->id_nombre_evento();
  // echo "<pre>";
  // print_r($info_promotor);
  // echo "</pre>";
  ?>

  <table class="display" id="tabla-eventos">
  <thead>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>LIBRO</th>
      <th scope='col'>NOMBRE EVENTO</th>
      <th scope='col'>Borrar</th>
      <th scope='col'>Informacion</th>
    </tr>

  </thead>
  <tbody>

    <?php
    if ($info_evento != null) {
      for ($x=0; $x < sizeof($info_evento); $x++) {
          echo  "<tr>";
          foreach ($info_evento[$x] as $key => $dato) {
            echo"<td>".$dato."</td>";
          }
          echo"<td><button class='borrar-evento btn-outline-success' type='button' name='button_borrar'>Borrar</button></td>";
          echo"<td>"."<button class='info-evento btn-outline-success' type='button' name='button_informacion'>".'Informaciòn'."</button>"."</td>";
          echo "</tr>";
      }

    }?>


  </tbody>
</table>
</div>

<div class="ajax-evento">

</div>

<div class="crudd">
  <button class="btn btn-outline-success" type="button" name="button">
  <div class="container">
    <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">Insertar Evento Nuevo</a>
  </div>
</button>
</div>

<div id="ident" class="collapse">
  <form action="" class="form-inline" method="post">
    <input  type="hidden" name="ingresar_evento" value="ingreso"/>

    <select class="id_libro" name="IdLibro" required>
      <option value="" disabled selected>Material</option>
         <?php foreach ($info_libro as $columna=> $dato): ?>
            <option value="<?= $dato['IdLibro'] ?>"> <?= $dato['Nombre']?></option>
         <?php endforeach; ?>
    </select>
<?php
      foreach ($columnas as $nombre) {
       if($nombre['COLUMN_NAME'] == 'Fecha_evento' ){
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
