<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $title ?></title>

	<link href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script languaje=’javascript’>alert('Bienvenido a la pagina de correos')</script>
</head>
<body>
	<div class="form-container">
<nav class="container"> 
	<div class="btn-group">
	<button type="button" class="btn btn-default">Nuevo</button>
  	<button type="button" class="btn btn-default">Mensajes Salida</button>
  	<button type="button" class="btn btn-default">Mensajes Entrada</button>
  	<button type="button" class="btn btn-default">Salir</button>
</div>
</nav>
</div>
 <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user/envio">
<div class="form-group">
    <label  class="col-xs-4 control-label">Email</label>
    <div class="col-xs-4">
      <input type="email" class="form-control" name="ncorreo" placeholder="Email">
    </div>
  </div>
  

  <div class="row">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-success btn-lg btn-block" name="guardar" >Guardar</button>
    </div>
  </div>
 
</form>



<div class="container">
<p><center>2015 Todos los Derechos Reservados</center></p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>