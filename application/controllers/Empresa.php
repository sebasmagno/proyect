<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa extends CI_Controller 
{
	var $user;
	function __construct() 
	{
        parent::__construct();
    }
	public function index() 
	{
		redirect('Empresa/home');
		//header('location:Empresa/home');
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
		$data['listEmpresas'] = $this->Empresas->listar();
		$this->load->view('admin/empresa', $data );
	}
	public function empresa() 
	{
		$data['listEmpresas'] = $this->Empresas->listar();
		$this->load->view('admin/empresa', $data );
	}
	// INICIO FUNCIONES DE EMPRESA
	public function agregar() 
	{		
		if ( ! $this->input->post('nombre'))
		{
			redirect('Empresa/empresa');
		} else 
		{
			$nit = $this->input->post('nit');
			$nomb = $this->input->post('nombre');
			$tel = $this->input->post('telefono');
			$dir = $this->input->post('direccion');
			if (! $this->input->post('idd')) 
			{
				if(!$this->Empresas->existe(0, $nit)) 
				{
					$dat = array('nit_empresa' => $nit);
					$dat1 = array('nom_empresa' => $nomb);
					$dat2 = array('telefono' => $tel);
					$dat3 = array('direccion' => $dir);
					$this->Empresas->insertar($dat, $dat1, $dat2, $dat3);
				} 
			} else 
			{
				$idd = $this->input->post('idd');
				$dat = array('nit_empresa' => $nit);
				$dat1 = array('nom_empresa' => $nomb);
				$dat2 = array('telefono' => $tel);
				$dat3 = array('direccion' => $dir);
				$this->Empresas->actualizar($dat, $dat1, $dat2, $dat3, $idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('Empresa/empresa');
		}
	}
	public function listarFiltro() 
	{
		if ($this->input->post('key')) 
		{
			$data = $this->Empresas->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) 
			{
			    echo $valor['id_visita'] . "::::" . $valor['descripcion'] . "----";
			}			
		}
	}
	public function eliminar() 
	{
		$idd = $this->input->post('idd');
		$this->Empresas->eliminar( $idd);
		redirect('Empresa/empresa');	
	}
}