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
			$email = $this->input->post('ncorreo');
			$name = $this->input->post('nusername');
			$encrip = md5($pas);
			$randcode = rand(1000,9000);
   			$data  = array(

				'name' => $this->input->post('nusername') , 
				'password' =>  $encrip,
				'estado' => 0 , 
				'code' => $randcode,
				'email' => $email,
				);
   		
			$this->load->model('model_user','user');
			$this->user->insert($data);
			
			
		redirect("http://localhost:8080/appCorreo/user/envio/?code=$randcode&mail=$email");
		
	}

	public function autenticar(){

		$this->load->model('model_user', 'user');
		$nam =$this->input->post('nusername');
    	$pas = $this->input->post('npassword'); 
		$encrip = md5($pas);
		$data['user'] = $this->user->getUser($nam,$encrip);
		$user = $data['user'];
		
		
	
		if (!empty($user)){
			if ($user->estado == 1) {
				$data['title'] = "Pagina Principal";
				$this->load->view('Pantillas/Header', $data);
         		$this->load->view('salidav');
         		$this->load->view('Pantillas/Footer');
         	}else{
         		echo "Usuario no verificado";
         	}
		}else{

		 redirect("/user/login");
         echo "Error contraseña";
		}
		
		
		}
	public function verificarUser(){
		$code = $_REQUEST['code'];
		
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

		//$email = $this->input->post('ncorreo');
		$email = $_REQUEST['mail'];
		

		$mail->From = $email; 
		$mail->FromName = "Nombre";
		$mail->Subject = "Notificacion";
		$mail->AltBody = "Este es un mensaje";  
		
		$code = $_REQUEST['code'];

		$mail->MsgHTML("<p>Dale click para verificar tu cuenta</p><a href='http://localhost:8080/appCorreo/user/verificarUser/?code=$code'>Verificar codigo</a>"); 
		
		$mail->AddAddress($email); 
		$mail->IsHTML(true); 
		
		
		$exito = $mail->Send(); // Envía el correo.


		if($exito){
			echo "El correo fue enviado correctamente";
			redirect("/user/login");
		}else{
			echo "Hubo un inconveniente. Contacta a un administrador";
		}
		redirect("http://localhost:8080/appCorreo/user/login");	
	}

	
}

