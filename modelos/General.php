<?php
class Modelo_general
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct($N_tabla)
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = $N_tabla;
  }

////////////////////////////////////////////////////
///////TRAER TODOS LOS NOMBRES DE LAS COLUMNAS//////
////////////////////////////////////////////////////

  function columnas()
{
  $colum_name = $this->wpdb->get_results (
      "SELECT COLUMN_NAME
      FROM INFORMATION_SCHEMA.COLUMNS
      WHERE TABLE_NAME = '{$this->nombre_tabla}'
      AND `TABLE_SCHEMA` = 'libreria'
      ORDER BY ORDINAL_POSITION",
      'ARRAY_A'
    );

  return $colum_name;
}

////////////////////////////////////////////////
///////TRAER TODOS LOS DATOS DE LA TABLA //////
///////////////////////////////////////////////

public function traer_datos(){
    $informacion = $this->wpdb->get_results(
          "SELECT *
          FROM `{$this->nombre_tabla}`
          ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;

  }

  public function insertar($datos){
    $this->wpdb->insert(
      $this->nombre_tabla, # TABLA
      $datos # DATOS
    );
  }





  // public function update_estudent($datos, $id){
  //   $this->wpdb->show_errors(false);
  //     $this->wpdb->update(
  //       $this->nombre_tabla, # TABLA
  //       $datos, # DATOS
  //       array('IdEstudiante' => $id)
  //     );
  // }
}
