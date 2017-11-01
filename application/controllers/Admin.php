<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
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
	public function retroceder() 
	{
		$this->load->view('menu' );
	}
	public function admin() 
	{
		redirect('Admin/home');
	}
	public function empresa() 
	{
		redirect('Empresa/home');
	}
	public function regcliente() 
	{
		redirect('RegCliente/home');
	}
	public function OrigenDestino() 
	{
		redirect('OrigenDestino/home');
	}
	public function home() 
	{	
		$data['listAreas'] = $this->Area->listar();
		$this->load->view('admin/areas', $data );
	}
	public function areas() 
	{
		$data['listAreas'] = $this->Area->listar();
		$this->load->view('admin/areas', $data );
	}
	// INICIO FUNCIONES DE AREAS
	public function agregar() 
	{		
		if ( ! $this->input->post('descripcion'))
		{
			redirect('Admin/areas');
		} else 
		{
			$descripcion = $this->input->post('descripcion');
			if (! $this->input->post('idd')) 
			{
				if(!$this->Area->existe(0, $descripcion)) 
				{
					$dat = array('descripcion' => $descripcion);
					$this->Area->insertar($dat);
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
			redirect('Admin/areas');
		}
	}
	public function listarFiltro() 
	{
		if ($this->input->post('key')) 
		{
			$data = $this->Area->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) 
			{
			    echo $valor['id_visita'] . "::::" . $valor['descripcion'] . "----";
			}			
		}
	}
	public function eliminar() 
	{
		$idd = $this->input->post('idd');
		$this->Area->eliminar( $idd);
		redirect('Admin/areas');	
	}
}