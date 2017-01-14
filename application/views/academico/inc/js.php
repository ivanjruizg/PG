<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
<script src="<?= base_url('assets/js/nprogress.js')?>"></script>
<script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>
<script src="<?= base_url('assets/js/mis-scripts/baseUrl.js');?>"></script>
<script src="<?= base_url('assets/js/libs/prefixfree.min.js');?>"></script>
<<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<!--<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>-->

<script>
    $(function () {
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            firstDay: 1,
            onSelect: function (date) {

p(date);


            },
        });
    });



    function p(date) {



           $.ajax({
            url:baseUrl+"/coordinador/p",
            type:"GET",
            data:{date:date},
            success: function (resp) {

               alert(resp);


            }, error: function () {

                alert("Error");

            }
        });


    }

</script>



