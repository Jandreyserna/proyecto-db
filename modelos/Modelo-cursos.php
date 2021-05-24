<?php

class Modelo_cursos
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'lb_cursos';
      #$this->get_key_foreaneas();
  }


  function informacion_tabla()
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_cursos.IdCurso, lb_profesores.Nombre, lb_cursos.Nombre AS NombreCurso,
           lb_libros.Nombre AS NombreLibro
            FROM lb_libros INNER JOIN lb_cursos INNER JOIN lb_profesores
            WHERE lb_cursos.IdLibro = lb_libros.IdLibro AND lb_profesores.IdProfesor = lb_cursos.IdProfesor",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function informacion_curso($id)
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_cursos.Nombre AS Curso, lb_profesores.Nombre AS NProfesor,
            lb_profesores.Apellidos AS AProfesor, lb_libros.Nombre AS Libro,
            lb_libros.Precio AS Precio, lb_cursos.fecha_inicio AS Inicio,
            lb_cursos.fecha_fin AS Fin
            FROM lb_libros INNER JOIN lb_cursos INNER JOIN lb_profesores
            WHERE lb_cursos.IdLibro = lb_libros.IdLibro
            AND lb_profesores.IdProfesor = lb_cursos.IdProfesor
            AND lb_cursos.IdCurso = $id",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function profesor_curso($id)
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_profesores.IdProfesor AS Id, lb_profesores.Nombre AS NProfesor,
            lb_profesores.Apellidos AS AProfesor
            FROM lb_cursos INNER JOIN lb_profesores
            WHERE lb_cursos.IdCurso = $id
            AND lb_profesores.IdProfesor = lb_cursos.IdProfesor",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function libro_curso($id)
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_libros.IdLibro AS IdL, lb_libros.Nombre AS NLibro
            FROM lb_cursos INNER JOIN lb_libros
            WHERE lb_cursos.IdCurso = $id
            AND lb_libros.IdLibro = lb_cursos.IdLibro",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function id_nombre_curso()
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_libros.IdCurso , lb_libros.Nombre
            FROM lb_cursos",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  public function eliminar_dato($dato){
    $this->wpdb->delete(
      $this->nombre_tabla, # TABLA
      array('IdCurso' => $dato) # DATOS
    );
  }
}
