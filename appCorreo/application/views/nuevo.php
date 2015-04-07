<p><br/></p>
<br/>
<br/>

		<p><h1><center>Nuevo Correo</center></h1></p>
		<br/>
<div class="container ">

  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user/insert">
   <div class="form-group">
    <label  class="col-xs-4 control-label">Destinario :</label>
    <div class="col-xs-4">
      <input type="email" class="form-control" name="nemail" placeholder="Destinario">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label">Asunto :</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="nasunto" placeholder="Asunto">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label">Mensaje :</label>
    
    <div class="col-xs-4"  >
      <input type="text"  class="form-control" name="nmensaje" placeholder="Mensaje">
    </div>
	</div>
  
  

  <div class="row">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-success btn-lg btn-block" name="guardar" >Guardar</button>
    </div>
  </div>
 
</form>
</div>