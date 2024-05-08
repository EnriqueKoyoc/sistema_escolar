@extends('layouts.admin')

@section('contenido')


<!-- Modal Structure -->
<div id="addRol" class="modal">
  <div class="modal-content">
    <h4>Agregar un nuevo rol</h4>
    <div id="basic-form" class="section">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              {{--  <h4 class="header2">Basic Form</h4>  --}}
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="nombreRol" name="nombreRol" type="text">
                      <label for="nombreRol">Nombre</label>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descripcionRol" name="descripcionRol" class="materialize-textarea"></textarea>
                      <label for="message">Descripción</label>
                    </div>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
        
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <div class="input-field col s4">
        <button class="btn waves-effect waves-light right" type="button" name="action">Cancelar
            <i class="material-icons right">highlight_off</i>
        </button>
    </div>
    <div class="input-field col s4">
        <button id="save-rol" class="btn waves-effect waves-light right" type="button" name="action">Guardar
            <i class="material-icons right">save</i>
        </button>
    </div>
  </div>
</div>


<div id="fabs-card" class="section">
    <h4 class="header">ROLES</h4>
    <div class="row">
        <div class="col s12">
            {{-- <p>Here is an image card with a Floating Action Button.</p> --}}
        </div>
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="col s12 m6 l12">
                    <div class="card">
                        <div class="card-content">
                            <a href="#addRol" class="modal-trigger btn-large waves-effect waves-light cyan">button<i class="material-icons right">playlist_add</i></a>                       

                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->nombreRol }}</td>
                                        <td>{{ $rol->descripcionRol }}</td>
                                        <td>
                                            <a class="btn-floating waves-effect waves-light green darken-1">
                                                <i class="material-icons">border_color</i>
                                              </a>
                                            <a class="btn-floating waves-effect waves-light red accent-2">
                                                <i class="material-icons">delete</i>
                                              </a>                                              
                                        </td>
                                    </tr>  
                                    @empty
                                        
                                    @endforelse                                      
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Accion</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    new DataTable('#example', {
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;
     
                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);
     
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                });
        }
    });
</script>

@include('roles.save')
@endsection