<script>
    $(document).on("click", "#save-rol", function(e) {

        var nombreRol = $("#nombreRol").val();
        var descripcionRol = $("#descripcionRol").val();
                  

        $.ajax({
            url: "{{ route('roles.store') }}",
            method: "POST",
            dataType: "json",
            data: {
                "_token": $("meta[name=csrf-token]").attr("content"),
                nombreRol: nombreRol,
                descripcionRol: descripcionRol
               
            },
            beforeSend: function () {
                                  
                var html = "";
                html += "<div class='preloader-wrapper big active'>"+
                    "<div class='spinner-layer spinner-blue-only'>"+
                      "<div class='circle-clipper left'>"+
                        "<div class='circle'></div>"+
                      "</div><div class='gap-patch'>"+
                        "<div class='circle'></div>"+
                      "</div><div class='circle-clipper right'>"+
                        "<div class='circle'></div>"+
                      "</div>"+
                    "</div>"+
                  "</div>";
                
                html += "<p>" + "</p>"

                let timerInterval;
                Swal.fire({
                title: "Espere un momento",
                html: "I will close in <b></b> milliseconds.",
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

                /*swal({
                    html:true,
                    title: "Guardando...",
                    text: html,
                    showConfirmButton: false
                    //confirmButtonText: "Ok",
                })*/

            },
            success: function(data){
                
                /*if(data.res == true){
                

                    swal({
                        title: "Escuela Modelo!",
                        text: "Se realizo el cambio de programa con éxito",
                        type: "success",
                        timer: 3000
                   }, 
                   function(confimar){
                      
                       location.reload();

                       if(confimar){
                            location.reload();
                       }
                   })     

                }

                if(data.res == "GradoDiferente"){
                    swal("Escuela Modelo", "El grado donde desea cambiar al alumno es difente al grado actual", "info");
                }

                if(data.res == "perActualDiferente"){
                    swal("Escuela Modelo", "Solo se puede realizar el tramite en el periodo vigente actual", "info");
                }

                if(data.res == "programaIgual"){
                    swal("Escuela Modelo", "Solo se puede realizar el tramite a un programa diferente al actual", "info");
                }*/
     
            },
            error: function(){
            }
        });
       
    });
</script>

