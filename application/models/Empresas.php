<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Empresas extends CI_Model 
{
	public function __construct() 
	{
        parent::__construct();
	}
	public function insertar($nit, $nombre, $telefono, $direccion)
	{
		return $this->db->insert('empresa', $nit + $nombre + $telefono + $direccion);
	}
	public function actualizar($nit, $nombre, $telefono, $direccion, $id) 
	{
		return $this->db->update('empresa', $nit + $nombre + $telefono + $direccion, compact('id'));
	}
	public function eliminar($id) 
	{
		$this->db->where(compact('id'));
		return $this->db->delete('empresa');
	}
	public function listar() 
	{
		$this->db->from('empresa');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listar_filtro($nom_empresa) 
	{
		$this->db->from('empresa');
		$this->db->like('nom_empresa', $nom_empresa);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function consultar($id) 
	{
		$this->db->from('empresa');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function obtenerNombre($id) 
	{
		$this->db->from('empresa');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['nom_empresa'];
	}
	public function existe($id) 
	{
		$this->db->from('empresa');
		$this->db->where(compact('id'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	