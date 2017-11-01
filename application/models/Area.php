<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Model {

	public function __construct() {
        parent::__construct();
	}

	public function insertar($dato) {
		return $this->db->insert('tbl_visita', $dato);
	}

	public function actualizar($moneda, $id_visita) {
		return $this->db->update('tbl_visita', $moneda, compact('id_visita'));
	}

	public function eliminar($id_visita) {
		$this->db->where(compact('id_visita'));
		return $this->db->delete('tbl_visita');
	}

	public function listar() {
		$this->db->from('tbl_visita');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar_filtro($descripcion) {
		$this->db->from('tbl_visita');
		$this->db->like('descripcion', $descripcion);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function consultar($id_visita) {
		$this->db->from('tbl_visita');
		$this->db->where(compact('id_visita'));
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function obtenerNombre($id_visita) {
		$this->db->from('tbl_visita');
		$this->db->where(compact('id_visita'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['descripcion'];
	}

	public function existe($id_visita) {
		$this->db->from('tbl_visita');
		$this->db->where(compact('id_visita'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	
