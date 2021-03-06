$( document ).ready(function () {

    if(typeof javascript != "undefined"){
        if (javascript.type == "added") {
            new PNotify({
                title: 'Success',
                text: 'Administrador ' + javascript.full_name + ' Correctamente Adicionado',
                type: 'success',
                styling: 'bootstrap3'
            });
        }
    }

    $(".js-switch").on('click',toggleActive);
    


});

function toggleActive() {
    var url = "admins/";
    var id = $(this).data("id");
    var active = $(this).is(":checked") ? 1 : 0;
    $.ajax({
        url: url+id,
        data: {"is_active":active},
        type: 'put',
        success: function(result)
        {
            if(!result.error){
                if(active){
                    new PNotify({
                        title: 'Success',
                        text: 'Admin Activado',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                }else{
                    new PNotify({
                        title: 'Success',
                        text: 'Admin Desactivado',
                        addclass: 'dark',
                        styling: 'bootstrap3'
                    });
                }
            }
        }
    });


}