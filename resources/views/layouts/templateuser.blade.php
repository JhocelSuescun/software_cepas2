<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es"> <!--<![endif]-->
<head>

    <title>UFPS - Cúcuta</title>

    <!-- Meta -->
    

    <!-- Favicon
    <link href='https://ww2.ufps.edu.co/assets/img/ico/favicon.ico' rel='Shortcut icon'>
    --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ("adminlte/plugins/datatables/jquery.dataTables.min.css") }}">
    
    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css'
          href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/bootstrap/css/bootstrap.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/ie8.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/blocks.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/plugins.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/style.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/app.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/shop.plugins.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/shop.blocks.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/style-switcher/style-switcher.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/shop.style.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/headers/header-v6.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/headers/header-v8.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/footers/footer-v1.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/animate.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/line-icons/line-icons.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/font-awesome/css/font-awesome.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/owl-carousel/owl-carousel/owl.carousel.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/horizontal-parallax/css/horizontal-parallax.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/layer-slider/layerslider/css/layerslider.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/theme-colors/ured.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/pages/profile.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/brand-buttons/brand-buttons.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/brand-buttons/brand-buttons-inversed.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/hover-effects/css/hover.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/plugins/hover-effects/css/custom-hover-effects.min.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/custom.css"><link type="text/css" rel="stylesheet" href="https://ww2.ufps.edu.co/assets/css/pgwslider/pgwslider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#mostrarmodal").modal("show");
            });
        </script>
    
<!--    <style>-->
<!--        body {-->
<!--            font-family: Helvetica, Arial, sans-serif;-->
<!--        }-->
<!--        h1 {-->
<!--            font-size: 20px;-->
<!--        }-->
<!--        div {-->
<!--            width: 100%;-->
<!--        }-->
<!--        img[usemap] {-->
<!--            border: none;-->
<!--            height: auto;-->
<!--            max-width: 100%;-->
<!--            width: auto;-->
<!--        }-->
<!--    </style>-->
</head>

<body class="header-fixed boxed-layout">

   
<div class="wrapper">
    <!--=== Header v6 ===-->
@include('layouts.headeruser')

<!--=== End Header v6 ===-->

    <!-- Alertas de la clase Template -->
    <div id="template_alerts">
                                    </div>

            <!--noticias-->
  @yield('contentuser')
  
            <!--fin noticias-->

<!-- EVENTOS ---------------------->


<!-- FIN EVENTOS --->


<!-- NOVEDADES -->

<!-- FIN DESTACADOS -->

<!-- ICONOS REDES SOCIALES -->
@include('layouts.socialnetworks')

<!-- FIN ICONOS REDES SOCIALES -->
@include('layouts.footeruser')

    

</div><!--/wrapper-->
<!--=== Footer Version 1 ===-->
<!-- organismos de control -->
<!--=== End Footer Version 1 ===-->



<!--<script type="text/javascript" src="{{ asset ("/assets/plugins/jquery/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/jquery/jquery-migrate.min.js") }}"></script>
--><script type="text/javascript" src="{{ asset ("/assets/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/pgwslider/pgwslider.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/back-to-top.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/smoothScroll.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/owl-carousel/owl-carousel/owl.carousel.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/horizontal-parallax/js/sequence.jquery-min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/greensock.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/layerslider.transitions.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/layerslider.kreaturamedia.jquery.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/app.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/plugins/owl-carousel.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/plugins/datepicker.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/plugins/validation.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/plugins/owl-recent-works.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/wow-animations/js/wow.min.js") }}"></script>
<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<script src="assets/plugins/html5shiv.js"></script>
<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->


<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-88760502-1', 'auto');
    ga('send', 'pageview');

</script>

<script src="{{ asset ("assets/js/jquery.datatables.js")}}"></script>
<script>
  $(document).ready(function() {


     $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "emptyTable":     "No existen registros",
    "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
    "infoEmpty":      "Showing 0 to 0 of 0 entries",
    "infoFiltered":   "(filtered from _MAX_ total entries)",
    "lengthMenu":     [ 5, 10, 25, 50,100 ],
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron resultados",
    "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "Next",
        "previous":   "Previous"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    },
    
    });



     
        
} );
  

</script>

<script type="text/javascript">

/*$.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "lengthMenu": false,
    "paginate": false,
    "info":false
} );
 */
 
$(document).ready(function() {
    $('#example3').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
} );
$(document).ready(function() {
    $('#example4').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );
$(document).ready(function() {
    $('#example5').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );
$(document).ready(function() {
    $('#example6').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );

</script>



</body>
</html>

