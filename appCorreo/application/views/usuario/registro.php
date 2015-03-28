

<p><h1><center>Registro Usuario</center></h1></p>
<br>
<div class="container ">

  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user/insert">
   <div class="form-group">
    <label  class="col-xs-4 control-label">User Name :</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="nusername" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label">Password :</label>
    <div class="col-xs-4">
      <input type="password" class="form-control" name="npassword" placeholder="Password">
    </div>
  </div>
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
</div>
<br>