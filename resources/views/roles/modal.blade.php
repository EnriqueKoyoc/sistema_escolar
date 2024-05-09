<!-- Modal Structure -->
  <div id="addRol" class="modal">
    <div class="modal-content">
      <h4 id="titulo-modal">Agregar Rol</h4>
      <form>
        <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                {{--  <h4 class="header2">Basic Form</h4>  --}}
                <div class="row">
                  <form class="col s12">

                    <div class="row" style="display: none;">
                      <div class="input-field col s12">
                        <label for="usuario_at">USUARIO</label>
                        <input id="usuario_at" name="usuario_at" value="{{ auth()->user()->id }}" type="text">                          
                      </div>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="input-field col s12">
                          <label for="rol_id">rol id</label>
                          <input id="rol_id" name="rol_id" type="text">                          
                        </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <label for="nombreRol">Nombre *</label>
                        <input id="nombreRol" name="nombreRol" type="text">                        
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="input-field col s12">
                        <label for="descripcionRol">Descripción</label>
                        <textarea id="descripcionRol" name="descripcionRol" class="materialize-textarea"></textarea>                        
                      </div>                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
      </form>   
    </div>
    <div class="modal-footer">
        <a href="#!" id="btn-cerrar" onclick="limpiar();" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>

      <button type="button" id="save-rol" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
  </div>