$(document).ready(function () {

    $('.dinheiro').mask('#.##0,00', { reverse: true });

    $('#senha-antiga').on('input', function () {
        $('#senha-nova').removeAttr('disabled');

        if($(this).val() == ""){
            $('#senha-nova').attr('disabled', 'disabled');
        }
     });
});
