<?php
class Modelo_eventos
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'lb_eventos';
  }

  function id_nombre_evento(){
    $informacion = $this->wpdb->get_results(
          "SELECT IdEvento, IdLibro, Nombre
            FROM lb_eventos",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function informacion_evento($id){
    $informacion = $this->wpdb->get_results(
          "SELECT lb_eventos.*, lb_libros.IdLibro,lb_libros.Nombre AS NameL
            FROM lb_eventos INNER JOIN lb_libros
            WHERE lb_eventos.IdEvento = $id
            AND lb_libros.IdLibro = lb_eventos.IdLibro ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


  function libro_evento($id){
    $informacion = $this->wpdb->get_results(
          "SELECT lb_libros.IdLibro,lb_libros.Nombre
            FROM lb_eventos INNER JOIN lb_libros
            WHERE lb_eventos.IdEvento = $id
            AND lb_libros.IdLibro = lb_eventos.IdLibro ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  function eliminar_dato($dato){
    $this->wpdb->delete(
      $this->nombre_tabla, # TABLA
      array('IdEvento' => $dato) # DATOS
    );
  }

}
