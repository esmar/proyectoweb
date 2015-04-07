<p><br/></p>

<div class="container">
      <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#salida" aria-controls="salida" role="tab" data-toggle="tab">Salida</a></li>
    <li role="presentation"><a href="#enviados" aria-controls="enviados" role="tab" data-toggle="tab">Enviados</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="salida">
      <br/>
      <a href="http://localhost:8080/appCorreo/correo/index" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nuevo</a>
       
      <br/>
      <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
              <th>ID</th>
              <th>Destinatario</th>
              <th>Asunto</th>
              <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
          <tr>
              <td>ID</td>
              <td>Destinatario</td>
              <td>Asunto</td>
              <td>Mensaje</td>
              <td>
                  <a href=""><span class="glyphicon glyphicon-edit" >Editar</a>
              </td>
              <td>
                  <a href=""><span class="glyphicon glyphicon-trash">Eliminar</a>
              </td>
            </tr>

        </tbody>
      </table>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="enviados">
      <br/>
      <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
              <th>ID</th>
              <th>Destinatario</th>
              <th>Asunto</th>
              <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
          <tr>
              <td>ID</td>
              <td>Destinatario</td>
              <td>Asunto</td>
              <td>Mensaje</td>
             
              <td>
                  <a href=""><span class="glyphicon glyphicon-trash">Eliminar</a>
              </td>
            </tr>

        </tbody>
      </table>
      </div>

    </div>
      
    </div>
  </div>
</div>
