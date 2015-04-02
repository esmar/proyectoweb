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
			$randcode = rand(1000,9000);
   			$data  = array(

				'name' => $this->input->post('nusername') , 
				'password' =>  $encrip,
				'estado' => 0 , 
				'code' => $randcode, 
				);
   			$name = $this->input->post('nusername');

   			$email = $this->input->post('ncorreo');
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
		
		
		
		if (!empty($user)){
			$data['title'] = "Pagina Principal";
         	$this->load->view('salidav',$data);

		}else{

		 redirect("/user/login");
         echo "Error contraseña";
		}
		
		
	}
	public function verificarUser(){
		$code = $_GET['code'];
	
		$this->load->model('model_user','user');
		$this->user->veriUser($code);
		redirect("/user/login");
	}
	
	public function envio(){

		include("class.phpmailer.php");
		include("class.smtp.php"); 
		$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
		$mail->Username = "santiesmar@gmail.com"; 
		$mail->Password = "dorff147/"; 
		$mail->Port = 465; 


		$mail->From = "santiesmar@gmail.com"; 
		$mail->FromName = "Nombre";
		$mail->Subject = "Titulo";
		$mail->AltBody = "Este es un mensaje";  
		
		
		$mail->MsgHTML("<a href='http://localhost:8080/appCorreo/user/verificarUser?code=1652'>Verificar codigo</a>"); 
		
		$mail->AddAddress("santiesmar@gmail.com"); $mail->IsHTML(true); 
		
		
		
		$exito = $mail->Send(); // Envía el correo.


		if($exito){
			echo "El correo fue enviado correctamente";
		}else{
			echo "Hubo un inconveniente. Contacta a un administrador";
		}

	}

	
}

