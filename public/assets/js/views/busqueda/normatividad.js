/**
 * Created by sif on 24/08/2016.
 */

    function getActo() {
        var entidad_selected = $('select[name=txtEnt]').val();
        $.ajax({
            data: {
                entidad_selected: entidad_selected,
            },
            type: 'POST',
            url: '<?php echo base_url("useccion/getActo"); ?>',
            success: function (data) {
                console.log(data);
                $('.actos').html(data);
            }
        })
    }

    function getAnyo() {
        var entidad_selected = $('select[name=txtEnt]').val();
        var acto_selected = $('select[name=txtActo]').val();
        $.ajax({
            data: {
                acto_selected: acto_selected,
                entidad_selected: entidad_selected,
            },
            type: 'POST',
            url: '<?php echo base_url("useccion/getAnyo"); ?>',
            success: function (data) {
                console.log(data);
                $('.anyo').html(data);
            }
        })
    }
