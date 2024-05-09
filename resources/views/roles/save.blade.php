<script>
    $(document).on("click", "#save-rol", function(e) {

        var rol_id = $("#rol_id").val();
        var nombreRol = $("#nombreRol").val();
        var descripcionRol = $("#descripcionRol").val();
        var usuario_at = $("#usuario_at").val();
                  
        if(nombreRol == null || nombreRol == ""){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Los campos con (*) no pueden estar vacíos!"
              });
        }else{
            $.ajax({
                url: "{{ route('roles.store') }}",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": $("meta[name=csrf-token]").attr("content"),
                    rol_id: rol_id,
                    nombreRol: nombreRol,
                    descripcionRol: descripcionRol,
                    usuario_at: usuario_at               
                },
                beforeSend: function () {
                    
                    let timerInterval;
                    Swal.fire({
                    title: "Guardando...",
                    html: "Se cerrara en <b></b> milisegundos.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                    });
    
                },
                success: function(data){
     
    
                    if(data.res){
                        Swal.fire({
                            title: "Good job!",
                            text: "El registro se realizo con éxito",
                            icon: "success"
                          });
                    }
    
                    if(data.res == "update"){
                        Swal.fire({
                            title: "Good job!",
                            text: "El registro se actualizo con éxito",
                            icon: "success"
                          });
                    }     
                      
                    if(data.exist){
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: "Ya existe registro con el mismo nombre"
                          });
                    }
                    
                    
                    //location.reload();
                    
    
    
                },
                error: function(){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                      });
                }
            });
        }

        
       
    });
</script>

