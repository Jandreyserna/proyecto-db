<?php
class Modelo_estudiantes
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'lb_estudiantes';
      #$this->get_key_foreaneas();
  }

  ###############################################################
  ####me traigo solo el id y nombre completo del estudiante #####
  ###############################################################

  function id_nombre_estudiante()
  {
    $informacion = $this->wpdb->get_results(
          "SELECT IdEstudiante, Idpromotor, Nombre, Apellido
            FROM lb_estudiantes",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ###############################################
  ####funcion para actualizar el estudiante #####
  ###############################################

  public function update_estudent($datos, $id){
    $this->wpdb->show_errors(false);
      $this->wpdb->update(
        $this->nombre_tabla, # TABLA
        $datos, # DATOS
        array('IdEstudiante' => $id)
      );
  }

  ##########################################################
  ####me traigo la informacion completa del estudiante #####
  ##########################################################

  function informacion_estudiante($id){
    $informacion = $this->wpdb->get_results(
          "SELECT lb_estudiantes.*, lb_promotores.Nombre AS nombre_promotor, lb_promotores.Apellido AS apellido_promotor
            FROM lb_estudiantes INNER JOIN lb_promotores
            WHERE lb_estudiantes.Idpromotor = lb_promotores.IdPromotor
            AND lb_estudiantes.IdEstudiante = $id",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ################################################
  ####encuentro el promotor de un estudiante #####
  ################################################


  function promotor_estudiante($id){
    $informacion = $this->wpdb->get_results(
          "SELECT lb_promotores.Nombre, lb_promotores.Apellido,lb_promotores.IdPromotor AS IdP
            FROM lb_estudiantes INNER JOIN lb_promotores
            WHERE lb_estudiantes.Idpromotor = lb_promotores.IdPromotor
            AND lb_estudiantes.IdEstudiante = $id",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;

  }

  ###############################
  ####elimino un estudiante #####
  ###############################
  public function eliminar_dato($dato){
    $this->wpdb->delete(
      $this->nombre_tabla, # TABLA
      array('IdEstudiante' => $dato) # DATOS
    );
  }
}
