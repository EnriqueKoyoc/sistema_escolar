<table id="tlb-roles" class="display" style="width:100%">
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
              <a href="#addRol" onclick="ver({{ $rol->id }}, '{{ $rol->nombreRol }}', '{{ $rol->descripcionRol }}');" class="modal-trigger btn-floating waves-effect waves-light amber darken-4">
                  <i class="material-icons">remove_red_eye</i>
                </a>

              @if($rol->nombreRol != "ADMINISTRADOR")
              <a href="#addRol" onclick="editarRol({{ $rol->id }}, '{{ $rol->nombreRol }}', '{{ $rol->descripcionRol }}');" class="modal-trigger btn-floating waves-effect waves-light green darken-1">
                  <i class="material-icons">border_color</i>
                </a>

              
              <button id="delete-rol" onclick="BorrarRol({{ $rol->id }})" class="btn-floating waves-effect waves-light red accent-2">
                  <i class="material-icons">delete</i>
              </button>
              @endif                                             
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