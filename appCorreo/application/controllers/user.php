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
			
			$encrip = md5($pas);
			$randcode = rand(1000,9000);
   			$data  = array(

   				'name' => $this->input->post('nname') , 
				'user' => $this->input->post('nusername') , 
				'password' =>  $encrip,
				'estado' => 0 , 
				'code' => $randcode,
				'email' => $email,
				);
   		
			$this->load->model('model_user','user');
			$id = $this->user->insert($data);
			
		$urln = base_url()."user/envioCorreo/?code=$randcode&mail=$email&id=$id";
		
		redirect($urln);
		
	}

	public function autenticar(){

		$this->load->model('model_user', 'user');
		$user =$this->input->post('nusername');
    	$pass = $this->input->post('npassword'); 
		$encrip = md5($pass);
		$data['user'] = $this->user->getUser($user,$encrip);
		$user = $data['user'];
		
		
	
		if (!empty($user)){
			if ($user->estado == 1) {
				
				$data['id']=$user->id;
				$data['title'] = "Pagina Principal";
				$this->load->model('model_correo','correo');
				$pendiente = "Pendiente";
				$id = $user->id;
				$emails= $this->correo->getAllBySalida($id,$pendiente);
				$data['emails'] = $emails;
				$enviado ="Enviado";
				$emailss = $this->correo->getAllByEnviado($id,$enviado);
				$data['emailss'] = $emailss;
				
				
				$this->load->view('Pantillas/Header', $data);
         		$this->load->view('vcorreos', $data);
         		$this->load->view('Pantillas/Footer');


				
         	}else{
         		$data['title'] ="Pagina Error";
         		
         		$data['mensaje'] = "Usuario  no verificado";
         		$this->load->view('Pantillas/Header', $data); 
         		$this->load->view('errorlogin',$data);
         		$this->load->view('Pantillas/Footer');
         	}
		}else{
				$data['title'] ="Pagina Error";
				$data['mensaje'] = "Usuario  contraseña incorrecta";
				$this->load->view('Pantillas/Header', $data);
         		$this->load->view('errorlogin',$data);
         		$this->load->view('Pantillas/Footer');
		 		
		}
		
		
		}
	public function verificar(){
		$code = $_REQUEST['code'];
		$id = $_REQUEST['id'];
		$this->load->model('model_user','user');
		$this->user->verificando($code,$id);
		$urln = base_url()."user/login";
		redirect($urln);
	}
	
	public function envioCorreo(){

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
		$id = $_REQUEST['id'];
		$link = base_url()."user/verificar/?code=$code&id=$id";
		
		$mail->MsgHTML("<p>Dale click para verificar tu cuenta</p><a href=$link>Verificar codigo</a>"); 
		
		$mail->AddAddress($email); 
		$mail->IsHTML(true); 
		
		
		$exito = $mail->Send(); // Envía el correo.


		if($exito){
			
			$urln = base_url()."user/login";
			
			redirect($urln);
		}else{
			echo "Hubo un inconveniente. Contacta a un administrador";
		}
		$urln = base_url()."user/vcorreos";
		redirect($urln);	
	}
	
	
}

