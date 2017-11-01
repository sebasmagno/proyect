<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
	}
	public function insertar($dato) 
	{
		return $this->db->insert('tbl_producción', $dato);
	}
	public function actualizar($moneda, $tbl_produccion_id)
	{
		return $this->db->update('tbl_producción', $moneda, compact('tbl_produccion_id'));
	}
	public function eliminar($tbl_produccion_id)
	{
		$this->db->where(compact('tbl_produccion_id'));
		return $this->db->delete('tbl_producción');
	}
	public function listar()
	{
		$this->db->from('tbl_producción');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listar_filtro($descripcion)
	{
		$this->db->from('tbl_producción');
		$this->db->like('descripcion', $descripcion);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function consultar($tbl_produccion_id)
	{
		$this->db->from('tbl_producción');
		$this->db->where(compact('tbl_produccion_id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function obtenerNombre($tbl_produccion_id)
	{
		$this->db->from('tbl_producción');
		$this->db->where(compact('tbl_produccion_id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['descripcion'];
	}
	public function existe($tbl_produccion_id)
	{
		$this->db->from('tbl_producción');
		$this->db->where(compact('tbl_produccion_id'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	
