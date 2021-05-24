<?php

if (!empty($_POST['actualizar_curso'])){

  actualizar_curso();

}else if (!empty($_POST['actualizar_estudiante'])) {

  actualizar_estudiante();

}

######################################################
#####OBTENER LOS DATOS DE UN ID EN BASE DE DATOS######
######################################################


#################################
######Ajax para Estudiante ######
#################################
function borrar_estudiante(){
  if (!empty($_POST['id'])){
     var_dump($_POST['id']);


     $eliminar = new Modelo_estudiantes();
     $eliminar->eliminar_dato($_POST['id']);

   }
   wp_die();
}

function informacion_estudiante(){
   if (!empty($_POST['id'])){
     $modelo = new Modelo_estudiantes();
     $modelo_promotores = new Modelo_promotor();
     $promotor = $modelo->promotor_estudiante($_POST['id']);
     $promotores = $modelo_promotores->id_nombre_promotor();
     $informacion = $modelo->informacion_estudiante($_POST['id']);
?>
     <div class="titulo text-center">
          <h2><?= $informacion[0]['Nombre'].' '.$informacion[0]['Apellido']; ?>
        </h2>
          <h3><?= $_POST['id']  ?></h3>
    </div>
    <ul>
      <li>
        <h5>Nombre Del Promotor: </h5>
        <h6><?= $informacion[0]['nombre_promotor'].' '.$informacion[0]['apellido_promotor']  ?></h6>
      </li>
      <li>
        <h5>Identificacion:</h5>
        <h6><?= $informacion[0]['Identificcion']  ?></h6>
      </li>
      <li>
        <h5>Ciudad:</h5>
         <h6><?= $informacion[0]['Ciudad']  ?></h6>
       </li>
      <li>
        <h5>Telefono:</h5>
        <h6><?= $informacion[0]['Telefono']  ?></h6>
       </li>
      <li>
        <h5>Correo:</h5>
        <h6><?= $informacion[0]['Correo']  ?></h6>
      </li>
      <li>
        <h5>Dirección:</h5>
        <h6><?= $informacion[0]['Direccion']  ?></h6>
      </li>
    </ul>

    <div class="crudd">
      <button class="btn btn-outline-success" type="button" name="button">
      <div class="container">
        <a href="#update" class="btn-crudd btn-sucess" data-toggle="collapse">Actualizar Estudiante</a>
      </div>
    </button>
    </div>

    <div id="update" class="collapse">
      <form action="" class="form-inline" method="post">
        <input  type="hidden" name="actualizar_estudiante" value="<?= $_POST['id'] ?>"/>
        <label for="campo1">Promotor </label>
        <select class="promotor" name="IdPromotor" required>
          <option value="<?= $promotor[0]['IdP'] ?>" disabled selected>
            <?= $promotor[0]['Nombre'].' '.$promotor['Apellido'] ?></option>
             <?php foreach ($promotores as $promo=> $datap): ?>
                <option value="<?= $datap['IdPromotor'] ?>"> <?= $datap['Nombre'].' '.$datap['Apellido'] ?></option>
             <?php endforeach; ?>
        </select>
        <p>
          <label for="campo1">Nombre </label>
          <input type="text"  name="Nombre" value="<?= $informacion[0]['Nombre']  ?>"/>
        </p>

        <p>
          <label for="campo1">Apellido </label>
          <input type="text"  name="Apellido" value="<?= $informacion[0]['Apellido']  ?>"/>
        </p>

        <p>
          <label for="campo1">Identificacion </label>
          <input type="text"  name="Identificcion" value="<?= $informacion[0]['Identificcion']  ?>"/>
        </p>

        <p>
          <label for="campo1">Ciudad </label>
          <input type="text"  name="Ciudad" value="<?= $informacion[0]['Ciudad']  ?>"/>
        </p>

        <p>
          <label for="campo1">Telefono </label>
          <input type="text"  name="Telefono" value="<?= $informacion[0]['Telefono']  ?>"/>
        </p>

        <p>
          <label for="campo1">Correo </label>
          <input type="text"  name="Correo" value="<?= $informacion[0]['Correo']  ?>"/>
        </p>

        <p>
          <label for="campo1">Dirección </label>
          <input type="text"  name="Direccion" value="<?= $informacion[0]['Direccion']  ?>"/>
        </p>


        <input  type="submit" value="Enviar"/>
      </form>
    </div>

<?php

    }
    wp_die();
}


#################################
######Ajax para Curso ###########
#################################

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
     $modelo_profesores = new Modelo_profesor();
     $modelo_libros = new Modelo_libro();
     $libros = $modelo_libros->  id_nombre_libro();
     $libro = $modelo->libro_curso($_POST['id']);
     $profesor = $modelo->profesor_curso($_POST['id']);
     $profesores = $modelo_profesores->id_nombre_profesor();
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
        <a href="#actualizar" class="btn-crudd btn-sucess" data-toggle="collapse">Actualizar Curso</a>
      </div>
    </button>
    </div>

    <div id="actualizar" class="collapse">
      <form action="" class="form-inline" method="post">
        <input  type="hidden" name="actualizar_curso" value="<?= $_POST['id'] ?>"/>

        <select class="id_profesor" name="IdProfesor" required>
          <option value="<?= $profesor[0]['Id'] ?>" disabled selected><?= $profesor[0]['NProfesor'].' '.$profesor[0]['AProfesor'] ?></option>
             <?php foreach ($profesores as $profe=> $datap): ?>
                <option value="<?= $datap['IdProfesor'] ?>"> <?= $datap['Nombre'].' '.$datap['Apellidos'] ?></option>
             <?php endforeach; ?>
        </select>
        <select class="id_libro" name="IdLibro" required>
          <option value="<?= $libro[0]['IdL'] ?>" disabled selected><?= $libro[0]['NLibro'] ?></option>
             <?php foreach ($libros as $lib=> $datal): ?>
                <option value="<?= $datal['IdLibro'] ?>"> <?= $datal['Nombre'] ?></option>
             <?php endforeach; ?>
        </select>
        <p>
          <label for="campo1">Nombre del Curso </label>
          <input type="text" id="campo1" name="Nombre" value="<?= $informacion[0]['Curso']  ?>"/>
        </p>

        <p>
          <label for="campo1">Fecha de Inicio </label>
          <input type="text" id="campo1" name="fecha_inicio" value="<?= $informacion[0]['Inicio']  ?>"/>
        </p>

        <p>
          <label for="campo1">Fecha de Fin </label>
          <input type="text" id="campo1" name="fecha_fin" value="<?= $informacion[0]['Fin']  ?>"/>
        </p>


        <input  type="submit" value="Enviar"/>
      </form>
    </div>

<?php

    }
    wp_die();
}

#################################
######Ajax para evento ###########
#################################

function borrar_evento(){
  if (!empty($_POST['id'])){

     $eliminar = new Modelo_eventos();
     $eliminar->eliminar_dato($_POST['id']);

   }
   wp_die();

}


function informacion_evento(){
  if (!empty($_POST['id'])){
    $modelo = new Modelo_eventos();
    $modelo_promotores = new Modelo_libro();
    $promotor = $modelo->libro_evento($_POST['id']);
    $promotores = $modelo_promotores->id_nombre_libro();
    $informacion = $modelo->informacion_evento($_POST['id']);
?>
    <div class="titulo text-center">
         <h2><?= $informacion[0]['Nombre'].' '.$informacion[0]['Apellido']; ?>
       </h2>
         <h3><?= $_POST['id']  ?></h3>
   </div>
   <ul>
     <li>
       <h5>Nombre Del Promotor: </h5>
       <h6><?= $informacion[0]['nombre_promotor'].' '.$informacion[0]['apellido_promotor']  ?></h6>
     </li>
     <li>
       <h5>Identificacion:</h5>
       <h6><?= $informacion[0]['Identificcion']  ?></h6>
     </li>
     <li>
       <h5>Ciudad:</h5>
        <h6><?= $informacion[0]['Ciudad']  ?></h6>
      </li>
     <li>
       <h5>Telefono:</h5>
       <h6><?= $informacion[0]['Telefono']  ?></h6>
      </li>
     <li>
       <h5>Correo:</h5>
       <h6><?= $informacion[0]['Correo']  ?></h6>
     </li>
     <li>
       <h5>Dirección:</h5>
       <h6><?= $informacion[0]['Direccion']  ?></h6>
     </li>
   </ul>

   <div class="crudd">
     <button class="btn btn-outline-success" type="button" name="button">
     <div class="container">
       <a href="#update" class="btn-crudd btn-sucess" data-toggle="collapse">Actualizar Estudiante</a>
     </div>
   </button>
   </div>

   <div id="update" class="collapse">
     <form action="" class="form-inline" method="post">
       <input  type="hidden" name="actualizar_estudiante" value="<?= $_POST['id'] ?>"/>
       <label for="campo1">Promotor </label>
       <select class="promotor" name="IdPromotor" required>
         <option value="<?= $promotor[0]['IdP'] ?>" disabled selected>
           <?= $promotor[0]['Nombre'].' '.$promotor['Apellido'] ?></option>
            <?php foreach ($promotores as $promo=> $datap): ?>
               <option value="<?= $datap['IdPromotor'] ?>"> <?= $datap['Nombre'].' '.$datap['Apellido'] ?></option>
            <?php endforeach; ?>
       </select>
       <p>
         <label for="campo1">Nombre </label>
         <input type="text"  name="Nombre" value="<?= $informacion[0]['Nombre']  ?>"/>
       </p>

       <p>
         <label for="campo1">Apellido </label>
         <input type="text"  name="Apellido" value="<?= $informacion[0]['Apellido']  ?>"/>
       </p>

       <p>
         <label for="campo1">Identificacion </label>
         <input type="text"  name="Identificcion" value="<?= $informacion[0]['Identificcion']  ?>"/>
       </p>

       <p>
         <label for="campo1">Ciudad </label>
         <input type="text"  name="Ciudad" value="<?= $informacion[0]['Ciudad']  ?>"/>
       </p>

       <p>
         <label for="campo1">Telefono </label>
         <input type="text"  name="Telefono" value="<?= $informacion[0]['Telefono']  ?>"/>
       </p>

       <p>
         <label for="campo1">Correo </label>
         <input type="text"  name="Correo" value="<?= $informacion[0]['Correo']  ?>"/>
       </p>

       <p>
         <label for="campo1">Dirección </label>
         <input type="text"  name="Direccion" value="<?= $informacion[0]['Direccion']  ?>"/>
       </p>


       <input  type="submit" value="Enviar"/>
     </form>
   </div>

<?php

   }
   wp_die();

}
