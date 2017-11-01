<?php defined('BASEPATH') OR exit('No direct script access allowed');
class OrigenDestinos extends CI_Model 
{
	public function __construct() 
	{
        parent::__construct();
	}
	public function insertar($orides, $tiempo)
	{
		return $this->db->insert('origen_destino', $orides + $tiempo);
	}
	public function actualizar($orides, $tiempo, $id) 
	{
		return $this->db->update('origen_destino', $orides + $tiempo, compact('id'));
	}
	public function eliminar($id) 
	{
		$this->db->where(compact('id'));
		return $this->db->delete('origen_destino');
	}
	public function listar() 
	{
		$this->db->from('origen_destino');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listar_filtro($orides) 
	{
		$this->db->from('origen_destino');
		$this->db->like('origendestino', $orides);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function consultar($id) 
	{
		$this->db->from('origen_destino');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function obtenerNombre($id) 
	{
		$this->db->from('origen_destino');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['origendestino'];
	}
	public function existe($id) 
	{
		$this->db->from('origen_destino');
		$this->db->where(compact('id'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	