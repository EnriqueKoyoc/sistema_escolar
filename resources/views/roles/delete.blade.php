<script>

    function BorrarRol(id){
        var rol_id = id;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn waves-effect waves-light green darken-1",
              cancelButton: "btn waves-effect waves-light red accent-2"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "¿Estas seguro que deseas borrar este registro?",
            text: "No será posible recuperarlo nuevamente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Borrar!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              
                //ajax de la chamaba 
                $.ajax({
                    url: "{{ route('roles.destroy') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "_token": $("meta[name=csrf-token]").attr("content"),
                        rol_id: rol_id              
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
        
                        if(data.res == "delete"){
                            Swal.fire({
                                title: "Genial!",
                                text: "El registro se elimino con éxito",
                                icon: "success"
                              });
                        }

                        location.reload();
                
                    },
                    error: function(){
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: '<a href="#">Why do I have this issue?</a>'
                          });
                    }
                });



            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "El registro no fue borrado",
                icon: "error"
              });
            }
          });
        
        
    }
</script>

