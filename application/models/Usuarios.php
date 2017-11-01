<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function __construct() {
        
	}

	public function insertar($dato) {
		return $this->db->insert('usuarios', $dato);
	}

	public function actualizar($dato, $usuario_id) {
		return $this->db->update('usuarios', $dato, compact('usuario_id'));
	}

	public function eliminar($usuario_id) {
		$this->db->where(compact('usuario_id'));
		return $this->db->delete('usuarios');
	}

	public function listar() {
		$this->db->from('usuarios');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar_filtro($usuario_id) {
		$this->db->from('usuarios');
		$this->db->like('usuario_id', $usuario_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function consultar($usuario_id) {
		$this->db->from('usuarios');
		$this->db->where(compact('usuario_id'));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function existe($usuario_id, $clave) {
		$this->db->from('usuarios', 'clave');
		$this->db->where(compact('usuario_id', 'clave'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	
