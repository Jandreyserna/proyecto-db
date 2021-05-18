<?php

function ingresar_estudiante(){
  unset($_POST['tabla']);
  unset($_POST['ingresar_estudiante']);

  $modelo = new Modelo_general('lb_estudiantes');
  print_r($_POST);
  $modelo->insertar(array_filter($_POST));

}
