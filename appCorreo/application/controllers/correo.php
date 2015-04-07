<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Pagina Nuevo Correo';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('nuevo');
		$this->load->view('Pantillas/Footer');
	}

}