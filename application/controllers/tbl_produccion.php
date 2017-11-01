<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_produccion extends CI_Controller 
{
	var $user;
	function __construct()
	{
        parent::__construct();
    }
	public function index() 
	{
		redirect('Admin/home');
		//header('location:Admin/home');
	}
	public function home()
	{	
		$data['listTbl'] = $this->tbl_produccion->listar();
		$this->load->view('admin/tbl', $data );
	}
	public function tbl()
	{
		$data['listTbl'] = $this->tbl_produccion->listar();
		$this->load->view('admin/tbl', $data );
	}
	// INICIO FUNCIONES
	public function agregar()
	{
		if ( ! $this->input->post('descripcion'))
		{
			redirect('Admin/Tbl_produccion');
		} else 
		{
			$descripcion = $this->input->post('descripcion');
			if (! $this->input->post('idd')) 
			{
				if(!$this->Tbl->existe(0, $descripcion))
				{
					$dat = array('descripcion' => $descripcion);
					$this->Tbl->insertar($dat);
				} else 
				{
					//$this->session->set_userdata('msg', 'Equipo ya existe. Verifique datos');
				}
			} else 
			{
				$idd = $this->input->post('idd');
				$dat = array('descripcion' => $descripcion);
				$this->Area->actualizar($dat, $idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('Admin/tbl_produccion');
		}
	}
	public function listarFiltroTbl() 
	{
		if ($this->input->post('key')) 
		{
			$data = $this->Tbl->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) 
			{
			    echo $valor['area_id'] . "::::" . $valor['descripcion'] . "----";
			}
			
		}
	}
	public function eliminar() 
	{
		if ($this->input->post('key')) 
		{
			$idd = $this->input->post('key');
			$this->Equipo->eliminar($idd);
		}
	}
}