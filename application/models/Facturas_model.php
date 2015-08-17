<?php
class Facturas_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function registrar_factura()
    {
      $data = array(
        'numero_factura' => $this->input->post('numero_factura'),
        'fecha' => $this->input->post('fecha'),
        'establecimiento' => $this->input->post('establecimiento'),
        'foto' => $this->input->post('foto')
      );

      $this->db->insert('facturas', $data);
      return $this->input->post('numero');
    }

    public function registrar_producto()
    {
      $data = array(
        'numero_factura' => $this->input->post('numero_factura'),
        'marca' => $this->input->post('marca'),
        'nombre' => $this->input->post('nombre'),
        'precio' => $this->input->post('precio'),
        'cantidad' => $this->input->post('cantidad')
      );

      $this->db->insert('productos', $data);
      return $this->input->post('numero_factura');
    }

    public function obtener_facturas($numero = NULL)
    {
      if ($numero === NULL)
      {

        $this->db->order_by('fecha_de_registro_en_sistema', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('facturas');

        return $query->result_array();
      }

      $query = $this->db->get_where('facturas', array('numero' => $numero));
      return $query->row_array();
    }

    public function obtener_productos($numero = NULL){
      if($numero === NULL){
        return false;
      }
      else
      {
        $this->db->order_by('fecha_de_registro_en_sistema', 'desc');
        $query = $this->db->get_where('productos', array('numero_factura' => $numero));
        return $query->result_array();
      }
    }
}
