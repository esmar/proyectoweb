<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function index()
	{
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('usuario/login');
		$this->load->view('Pantillas/Footer');
	}
	public function login(){
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('usuario/login');
		$this->load->view('Pantillas/Footer');
	}
	public function registrar(){
		$data['title'] = 'Pagina Registro';
		$this->load->view('Pantillas/Header', $data);
		$this->load->view('usuario/registro');
		$this->load->view('Pantillas/Footer');

	}
	public function insert(){

			$pas = $this->input->post('npassword'); 
			$encrip = md5($pas);

   			$data  = array(

				'name' => $this->input->post('nusername') , 
				'password' =>  $encrip,
				'estado' => 0 ,  
				);

			$this->load->model('model_user','user');
			$this->user->insert($data);
				
			redirect("/user/login");	

	}

	public function autenticar(){

		$this->load->model('model_user', 'user');
		$nam =$this->input->post('nusername');
    	$pas = $this->input->post('npassword'); 
		$encrip = md5($pas);
		$data['user'] = $this->user->getUser($nam,$encrip);
		$user = $data['user'];
	
		if ($user > 1) {
			$data['title'] = "Pagina Principal";
         	$this->load->view('salidav',$data);

		}else{

		 
         redirect("/user/login");
         echo "Error contraseña";
		}
		
		
	}


	public function consultarUser(){



	}
}

