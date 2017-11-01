 <div class="modal fade" id="regPersonal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Nuevo Personal</h4>
              </div>
              <div class="modal-body">
               <form id="registrarPer" class="form-horizontal">

                <div class="form-group">
                            <label for="nombre" class="col-sm-2 col-xs-2 control-label">Nombre:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="apellido" class="col-sm-2 col-xs-2 control-label">Apellido:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="dni" class="col-sm-2 col-xs-2 control-label">DNI:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="DNI" id="dni" name="dni";  required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="edad" class="col-sm-2 col-xs-2 control-label">Edad:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="Edad" id="edad"name="edad" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="correo" class="col-sm-2 col-xs-2 control-label">Correo:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" required>
                            </div>
                </div>
              
                <div class="form-group">
                            <label for="correo" class="col-sm-2 col-xs-2 control-label">Direccion:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Direccion" id="direccion" name="direccion" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="dni" class="col-sm-2 col-xs-2 control-label">Telefono:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="Telefono" id="telefono" name="telefono"  required>
                            </div>
                </div>
              
                <div class="form-group">
                            <label for="ocupa" class="col-sm-2 col-xs-2 control-label">Ocupacion:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Ocupacion" id="ocupacion" name="ocupacion" required>
                            </div>
                </div>
                  
              
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="margin-bottom: 5px">Aceptar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </form>  
            </div>
          </div>      
        </div>
    </div>
<!--Modal modificar-->
<div class="modal fade" id="ModiPersonal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Editar Personal</h4>
              </div>
              <div class="modal-body">
               <form id="ModifPersonal" class="form-horizontal">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                            <label for="nombre" class="col-sm-2 col-xs-2 control-label">Nombre:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="apellido" class="col-sm-2 col-xs-2 control-label">Apellido:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="dni" class="col-sm-2 col-xs-2 control-label">DNI:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="DNI" id="dni" name="dni"; maxlength="8"  required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="edad" class="col-sm-2 col-xs-2 control-label">Edad:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="Edad" id="edad"name="edad" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="correo" class="col-sm-2 col-xs-2 control-label">Correo:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" required>
                            </div>
                </div>
              
                <div class="form-group">
                            <label for="correo" class="col-sm-2 col-xs-2 control-label">Direccion:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Correo" id="direccion" name="direccion" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="dni" class="col-sm-2 col-xs-2 control-label">Telefono:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="number" class="form-control" placeholder="Telefono" id="telefono" name="telefono" required>
                            </div>
                </div>
              
                <div class="form-group">
                            <label for="ocupa" class="col-sm-2 col-xs-2 control-label">Ocupacion:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Ocupacion"  id="ocupacion" name="ocupacion" required>
                            </div>
                </div>

                <div class="form-group">
                            <label for="ocupa" class="col-sm-2 col-xs-2 control-label">Usuario:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="text" class="form-control" placeholder="Usuario"  id="usuario" name="usuario">
                            </div>
                </div>

                <div class="form-group">
                            <label for="ocupa" class="col-sm-2 col-xs-2 control-label">Password:</label>
                            <div class="col-sm-10 col-xs-12">
                              <input type="password" class="form-control" placeholder="password"  id="password" name="password" >
                            </div>
                </div>
                  
              
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="margin-bottom: 5px">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </form>  
            </div>
          </div>      
        </div>
    </div>

<!-- ModalElim -->
<div class="modal fade" id="modalElim">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Personal</h4>
              </div>
              <div class="modal-body">
               <form id="eliminaPer" class="form-horizontal">
                                      
                <div class="form-group">
                            <div class="col-sm-10 col-xs-12">
                              <h4>Esta seguro de Eliminar este personal ?<h4>
                            </div>
                </div>
                <input type="hidden" name="id" id="id">
              
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="margin-bottom: 5px">Aceptar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
              </form>  
            </div>
          </div>      
        </div>
    </div>
<!-- VerPersonal -->
<div class="modal fade" id="ModVerPersonal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Informacion Personal</h4>
              </div>
              <div class="modal-body">
               <form id="" class="form-horizontal">
                <div class="form-group">
                <label for="codigo" class="col-sm-2 col-xs-2 control-label">Codigo:</label>
                    <div class="col-sm-10 col-xs-12">
                      <h5 id="codigo"></h5>
                    </div>
                </div>
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                          <label for="nombre" class="col-sm-2 col-xs-2 control-label">Nombre:</label>
                          <div class="col-sm-10 col-xs-12">
                               <h5 id="nombre"></h5>
                          </div>
                </div>

                <div class="form-group">
                          <label for="apellido" class="col-sm-2 col-xs-2 control-label">Apellido:</label>
                          <div class="col-sm-10 col-xs-12">
                               <h5 id="apellido"></h5>
                          </div>
                </div>

                <div class="form-group">
                          <label for="dni" class="col-sm-2 col-xs-2 control-label">DNI:</label>
                          <div class="col-sm-10 col-xs-12">
                              <h5 id="dni"></h5> 
                          </div>
                </div>

                <div class="form-group">
                          <label for="edad" class="col-sm-2 col-xs-2 control-label">Edad:</label>
                          <div class="col-sm-10 col-xs-12">
                              <h5 id="edad"></h5> 
                          </div>
                </div>

                <div class="form-group">
                          <label for="correo" class="col-sm-2 col-xs-2 control-label">Correo:</label>
                          <div class="col-sm-10 col-xs-12">
                               <h5 id="correo"></h5>
                         </div>
                </div>
              
                <div class="form-group">
                          <label for="correo" class="col-sm-2 col-xs-2 control-label">Direccion:</label>
                          <div class="col-sm-10 col-xs-12">
                               <h5 id="direccion"></h5>
                          </div>
                </div>

                <div class="form-group">
                            <label for="dni" class="col-sm-2 col-xs-2 control-label">Telefono:</label>
                            <div class="col-sm-10 col-xs-12">
                            <h5 id="telefono"></h5>
                            </div>
                </div>
              
                <div class="form-group">
                          <label for="ocupa" class="col-sm-2 col-xs-2 control-label">Ocupacion:</label>
                          <div class="col-sm-10 col-xs-12">
                          <h5 id="ocupacion"></h5>
                          </div>
                </div>
                  
              
                <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-bottom: 5px">Aceptar</button>
                </div>
              </form>  
            </div>
          </div>      
        </div>
    </div>