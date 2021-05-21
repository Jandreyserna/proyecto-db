<?php
######################################################
#####OBTENER LOS DATOS DE UN ID EN BASE DE DATOS######
######################################################


function info_complete(){
     echo "hola";

    wp_die();
}

function borrar_curso(){
   if (!empty($_POST['id'])){
      var_dump($_POST['id']);


      $eliminar = new Modelo_cursos();
      $eliminar->eliminar_dato($_POST['id']);

    }
    wp_die();
}


function informacion_curso(){
   if (!empty($_POST['id'])){
     $modelo = new Modelo_cursos();
     $informacion = $modelo->informacion_curso($_POST['id']);
?>
     <div class="titulo text-center">
          <h2><?= $informacion[0]['Curso']; ?>
        </h2>
          <h3><?= $_POST['id']  ?></h3>
    </div>
    <ul>
      <li>
        <h5>Nombre Del Profesor: </h5>
        <h6><?= $informacion[0]['NProfesor'].' '.$informacion[0]['AProfesor']  ?></h6>
      </li>
      <li>
        <h5>Material:</h5>
        <h6><?= $informacion[0]['Libro']  ?></h6>
      </li>
      <li>
        <h5>Costo De Curso:</h5>
         <h6><?= $informacion[0]['Precio']  ?></h6>
       </li>
      <li>
        <h5>Fecha De Inicio:</h5>
        <h6><?= $informacion[0]['Inicio']  ?></h6>
       </li>
      <li>
        <h5>Fecha De Fin:</h5>
        <h6><?= $informacion[0]['Fin']  ?></h6>
      </li>
    </ul>

    <div class="crudd">
      <button class="btn btn-outline-success" type="button" name="button">
      <div class="container">
        <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">IActualizar Curso</a>
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

<?php

    }
    wp_die();
}
