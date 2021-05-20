<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE CURSOS</h1>
</div>

<?php
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
    <th scope='col'>actu</th>
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
          echo"<td><button class='borrar_curso btn-outline-success' type='button' name='button_borrar'>Borrar</button></td>";
          echo"<td>"."<button class='actualizar-estudiantes btn-outline-success' type='button' name='button_actualizar'>".'Actualizar'."</button>"."</td>";
          echo "</tr>";
      }

    }?>
</tbody>
</table>

<div class="resultado-borrar">

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
