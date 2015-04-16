<?php 

include("class.phpmailer.php");
include("class.smtp.php"); 

<<<<<<< HEAD
			$servername= '127.0.0.1';
			$user = 'root';
			$password = '';
=======
		$servername= '127.0.0.1';
		$user = 'root';
		$password = '';
>>>>>>> origin/master

		try {
    		$conn = new PDO("mysql:host=$servername;dbname=correos", $user,$password);
    // set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		echo "Connected successfully" . "\n"; 
    
       
      		$sql = sprintf("SELECT `id`,`destinatario`,`iduser`,`asunto`,`mensaje` FROM `emails` WHERE  `estado` = 'Pendiente' ");
	
			$consulta = $conn->prepare($sql);
			$consulta->execute();
			$registro = $consulta->fetchAll();
			}
			catch(PDOException $e)
    		{
    			echo "Connection failed: " . $e->getMessage();
    		}
<<<<<<< HEAD
    function getUsers($servername,$user,$password){
    	try {
    		$conn = new PDO("mysql:host=$servername;dbname=correos", $user,$password);
   
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "Connected successfully" . "\n"; 
			
		$stmt = $conn->query("SELECT * FROM `users`");
		return $stmt->fetchAll(PDO::FETCH_OBJ);
			
			

    	} catch (Exception $e) {
    			echo "Connection failed: " . $e->getMessage();
    	}
    }
    		
    			
    		
    		
    			
    			
    			
    			
    $users = getUsers($servername,$user,$password);
    for ($i=0; $i<count($registro) ; $i++) {

    		$idus = $registro[$i]['iduser'];
    		foreach ($users as $value) {
    				$idn = $value->id;
    				if ($idn == $idus) {
    				$name = $value->name;
    				$email = $value->email;
    			}
    		}
    		

   
	if (!empty($registro)) {
			$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl"; 
			$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
			$mail->Username = "santiesmar@gmail.com"; 
			$mail->Password = "dorff147/"; 
			$mail->Port = 465; 
			echo $name ;
    		echo $email ;
    		
		

			$mail->From = $email; 
			$mail->FromName = $name;
			$mail->Subject = $registro[$i]['asunto'];
			$mail->AltBody = "Este es un mensaje";  
			$mail->MsgHTML($registro[$i]['mensaje']); 
		
			$mail->AddAddress($registro[$i]['destinatario']); 
			$mail->IsHTML(true); 
		
		
			$exito = $mail->Send(); // Envía el correo.


	if($exito){
		try {
			$servername= '127.0.0.1';
			$user = 'root';
			$password = '';
=======
    		
    		
    		
    		for ($i=0; $i<count($registro) ; $i++) {
    					
    			$servername= '127.0.0.1';
				$user = 'root';
				$password = '';
    			$conn = new PDO("mysql:host=$servername;dbname=correos", $user,$password);
   
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			echo "Connected successfully" . "\n"; 
				$sql = sprintf("SELECT `name`,`email` FROM `users` WHERE  `id`=".$registro[$i]["iduser"] );
				
				$consulta = $conn->prepare($sql);
				$consulta->execute();
				$user = $consulta->fetchAll();
						
    			
			
		$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
		$mail->Username = "santiesmar@gmail.com"; 
		$mail->Password = "dorff147/"; 
		$mail->Port = 465; 

		

		$mail->From = $user[$i]['email']; 
		$mail->FromName = $user[$i]['name'];
		$mail->Subject = $registro[$i]['asunto'];
		$mail->AltBody = "Este es un mensaje";  
		$mail->MsgHTML($registro[$i]['mensaje']); 
		
		$mail->AddAddress($registro[$i]['destinatario']); 
		$mail->IsHTML(true); 
		
		
		$exito = $mail->Send(); // Envía el correo.


		if($exito){
			try {
					$servername= '127.0.0.1';
				$user = 'root';
				$password = '';
>>>>>>> origin/master
    		$conn = new PDO("mysql:host=$servername;dbname=correos", $user,$password);
    // set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		echo "Connected successfully" . "\n"; 
    
       
      		$sql2 = sprintf("UPDATE `emails` SET `estado`='Enviado' WHERE `id`=".$registro[$i]['id']);
    
        //echo $sql2; die(); 
        	$stmt = $conn->prepare($sql2);  
     	
     		$stmt->execute();

    		echo $stmt->rowCount() . " Record updated successfully" ."\n" ;

    
<<<<<<< HEAD
    	}
		catch(PDOException $e)
    	{
    			echo "Connection failed: " . $e->getMessage();
    	}
				
	}
	else
	{
			echo "Hubo un inconveniente. Contacta a un administrador";
	}

	}	
		


}	
=======
    		}
			catch(PDOException $e)
    		{
    		echo "Connection failed: " . $e->getMessage();
    		}
			$conn = null;
			
			}else{
			echo "Hubo un inconveniente. Contacta a un administrador";
			}


		}	
>>>>>>> origin/master
	



		
		
