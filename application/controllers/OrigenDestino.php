<?php defined('BASEPATH') OR exit('No direct script access allowed');
class OrigenDestino extends CI_Controller 
{
	var $user;
	function __construct() 
	{
        parent::__construct();
    }
	public function index() 
	{
		redirect('OrigenDestino/home');
		//header('location:OrigenDestino/home');
	}
	public function retroceder() 
	{
		$this->load->view('menu');
	}
	public function admin() 
	{
		redirect('Admin/home');
	}
	public function home() 
	{	
		$data['listOrigenDestinos'] = $this->OrigenDestinos->listar();
		$this->load->view('admin/origendestino', $data );
	}
	public function origendestino() 
	{
		$data['listOrigenDestinos'] = $this->OrigenDestinos->listar();
		$this->load->view('admin/origendestino', $data );
	}
	// INICIO FUNCIONES DE ORIGENDESTINO
	public function agregar() 
	{		
		if ( ! $this->input->post('orides'))
		{
			redirect('OrigenDestino/origendestino');
		} else 
		{
			$orides = $this->input->post('orides');
			$tiempo = $this->input->post('tiempo');
			if (! $this->input->post('idd')) 
			{
				if(!$this->OrigenDestinos->existe(0, $orides)) 
				{
					$dat = array('origendestino' => $orides);
					$dat1 = array('tiempo' => $tiempo);
					$this->OrigenDestinos->insertar($dat, $dat1);
				} 
			} else 
			{
				$idd = $this->input->post('idd');
				$dat = array('origendestino' => $orides);
				$dat1 = array('tiempo' => $tiempo);
				$this->OrigenDestinos->actualizar($dat, $dat1, $idd);
			}
			redirect('OrigenDestino/origendestino');
		}
	}
	public function listarFiltro() 
	{
		if ($this->input->post('key')) 
		{
			$data = $this->OrigenDestinos->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) 
			{
			    echo $valor['id_visita'] . "::::" . $valor['descripcion'] . "----";
			}			
		}
	}
	public function eliminar() 
	{
		$idd = $this->input->post('idd');
		$this->OrigenDestinos->eliminar( $idd);
		redirect('OrigenDestino/origendestino');	
	}
}