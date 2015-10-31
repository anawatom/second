/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    }); 

    $('#modalClnStaffButton').click(function(){
        $('#modal-cln-staff').modal('show')
                .find('#modal-cln-staff-content')
                .load($(this).attr('value'));
    });    
    
    $('.select-staff-resp-button').click(function(){
        alert ('dkdkdkd') ;
    }) ;
});

function bootbox_dialog_auto_close( message , delay_ms) {
        bootbox.dialog( { message : 'alskfdjds' ,title: "Custom title"} );  
        window.setTimeout(function(){ bootbox.hide(); },delay_ms); // 10 seconds expressed in milliseconds 
}

function show_stack_topleft(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-topleft",
        stack: stack_topleft
    };
    switch (type) {
    case 'error':
        opts.title = "Oh No";
        opts.text = "Watch out for that water tower!";
        opts.type = "error";
        break;
    case 'info':
        opts.title = "Breaking News";
        opts.text = "Have you met Ted?";
        opts.type = "info";
        break;
    case 'success':
        opts.title = "Good News Everyone";
        opts.text = "I've invented a device that bites shiny metal asses.";
        opts.type = "success";
        break;
    }
    new PNotify(opts);
}