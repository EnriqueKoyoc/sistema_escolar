<script>

    function AgregarRol(){

        $("#titulo-modal").html("Agregar Rol");
        $("#save-rol").show();

        $('#nombreRol').attr('readonly', false);
        $('#descripcionRol').attr('readonly', false);
        
        $("#btn-cerrar").html("Cancelar");
    }

    function editarRol(id, nombre, descripcion){

        $("#titulo-modal").html("Editar Rol");

        $("#rol_id").val(id);        
        $("#nombreRol").val(nombre);
        $("#descripcionRol").val(descripcion);     

        $(".input-field").removeClass("input-field");

        $('#nombreRol').attr('readonly', false);
        $('#descripcionRol').attr('readonly', false);

        $("#save-rol").show();

    }

    

    function limpiar(){
        $("#rol_id").val("");        
        $("#nombreRol").val("");
        $("#descripcionRol").val("");
    }

    function ver(id, nombre, descripcion){

        $("#titulo-modal").html("Detalles Rol");
        $("#rol_id").val(id);        
        $("#nombreRol").val(nombre);
        $("#descripcionRol").val(descripcion);
        $(".input-field").removeClass("input-field");
        $("#save-rol").hide();
        $("#btn-cerrar").html("Cerrar");

        $('#nombreRol').attr('readonly', true);
        $('#descripcionRol').attr('readonly', true);

    }
</script>