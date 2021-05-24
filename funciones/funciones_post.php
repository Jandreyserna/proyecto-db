<?php

function ingresar_estudiante(){
  unset($_POST['tabla']);
  unset($_POST['ingresar_estudiante']);

  $modelo = new Modelo_general('lb_estudiantes');
  $modelo->insertar(array_filter($_POST));

}

function ingresar_curso(){

  $modelo = new Modelo_general('lb_cursos');
  $modelo->insertar(array_filter($_POST));

}

function ingresar_evento(){
  unset($_POST['ingresar_evento']);
  $modelo = new Modelo_general('lb_eventos');
  $modelo->insertar(array_filter($_POST));

}

function actualizar_curso(){

  $modelo = new Modelo_general('lb_cursos');
  $id['Id'] = $_POST['actualizar_curso'];
  $id['name'] = 'IdCurso';
  unset($_POST['actualizar_curso']);
  $modelo->update(array_filter($_POST), $id);

}

function actualizar_estudiante(){

  $modelo = new Modelo_general('lb_estudiantes');
  $id['Id'] = $_POST['actualizar_estudiante'];
  $id['name'] = 'IdEstudiante';
  unset($_POST['actualizar_estudiante']);
  $modelo->update(array_filter($_POST), $id);

}

function actualizar_evento(){

  $modelo = new Modelo_general('lb_eventos');
  $id['Id'] = $_POST['actualizar_evento'];
  $id['name'] = 'IdEvento';
  unset($_POST['actualizar_evento']);
  $modelo->update(array_filter($_POST), $id);

}
