
    $(document).ready(function(){

        var error = $('#error');
        console.log(error);
        if(error != undefined){
            $.notify({
                icon: 'pe-7s-speaker',
                message: "Ha ocurrido un error al registrar el usuario"
            },{
                type: 'danger',
                timer: 4000
            });
        }



    });

