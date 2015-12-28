function popUp() {
    $("#popup_").dialog( {
        modal : true,
        resizable : false,
        width : 300,
        title : 'Permissão negada!',
        buttons : {
            "OK" : function() {
                $(this).dialog("close");
                history.back();
            }
        }
    });
}

function cancelarCadastro() {
    $("#dialog-confirm").dialog( {
        modal : true,
        resizable : false,
        width : 230,
        title : 'Tem certeza disso?',
        buttons : {
            "Sim" : function() {
                location.reload();
                $('body').scrollTop(0);
                $(this).dialog("close");

            },
            "Não" : function() {
                $(this).dialog("close");
            }

        }
    });
}

function subirScroll() {
    $('body').scrollTop(0);
}