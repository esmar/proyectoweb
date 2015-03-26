<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function index()
	{
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('User/login');
		$this->load->view('Pantillas/Footer');
	}
	public function login(){
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('User/login');
		$this->load->view('Pantillas/Footer');
	}

	public function validar(){
		
		
	}
}

