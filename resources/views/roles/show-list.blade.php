@extends('layouts.admin')

@section('contenido')

@include('roles.modal')




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
                            <a href="#addRol" onclick="AgregarRol();" id="agregarnuevo" class="modal-trigger btn-large waves-effect waves-light cyan">Agregar<i class="material-icons right">playlist_add</i></a>                       
                            @include('roles.table')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    
    new DataTable('#tlb-roles', {
        destroy: true,
        responsive: true,
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
@include('roles.funcionesJavaScrip')
@include('roles.delete')
@endsection