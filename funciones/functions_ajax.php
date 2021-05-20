<?php
######################################################
#####OBTENER LOS DATOS DE UN ID EN BASE DE DATOS######
######################################################


function info_complete(){
     echo "hola";

    wp_die();
}

function borrar_curso(){
  // if (!empty($_POST['id'])){
      var_dump($_POST['id']);


      $eliminar = new Modelo_cursos();
      $eliminar->eliminar_dato($_POST['id']);

   // }
    wp_die();
}
