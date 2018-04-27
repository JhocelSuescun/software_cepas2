<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html> <!--<![endif]-->
<head>

    <title>MAJUMBA</title>

    <!-- Meta -->
    

    <!-- Favicon -->
    <!--<link href='https://ww2.ufps.edu.co/assets/img/ico/favicon.ico' rel='Shortcut icon'>
   --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css'
          href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/bootstrap/css/bootstrap.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/ie8.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/blocks.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/plugins.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/style.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/app.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/shop.plugins.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/shop.blocks.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/style-switcher/style-switcher.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/shop.style.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/headers/header-v6.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/headers/header-v8.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/footers/footer-v1.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/animate.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/line-icons/line-icons.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/font-awesome/css/font-awesome.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/owl-carousel/owl-carousel/owl.carousel.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/horizontal-parallax/css/horizontal-parallax.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/layer-slider/layerslider/css/layerslider.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/theme-colors/ured.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/pages/profile.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/brand-buttons/brand-buttons.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/brand-buttons/brand-buttons-inversed.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/hover-effects/css/hover.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/plugins/hover-effects/css/custom-hover-effects.min.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/custom.css") }}">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/assets/css/pgwslider/pgwslider.min.css") }}">
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

    

<div class="row no-margin">
    <div class="col-md-12 no-padding">
        <ul class="pgwSlider">
             @foreach ($noticia as $not)
                    <li class="elt_1" style="opacity: 0; z-index: 1; display: none;">
                        @if($not->informacion!=null)
                        <a href="{{ url('/noticia/consultar', ['id' => $not->id]) }}">
                            <img src="{{$not->imagen }}" alt="{{ $not->titulo }}">
                        </a>
                        @else
                        <a>
                            <img src="{{$not->imagen }}" alt="{{ $not->titulo }}">
                        </a>
                        @endif
                    </li>
                    @endforeach     
         </ul>
    </div>
</div>    

            <!--fin noticias-->
            <!--novedades-->
<div style="background-color: #e8e8e8; ">
  <div class="container content-prin profile">
    <div class="row margin-top-10">
      <div class="headline-center-v2 headline-center-v2-dark margin-bottom-10">
        <h1 class="shop-h1" style="font-size: 30px;"><b>Novedades</b></h1>
        <span class="bordered-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
      </div>
      <div class="col-md-12">
        <div class="row equal-height-columns margin-bottom-10">
          <div class="container">
            <ul class="row block-grid-v2">
                @foreach ($novedad as $nov)
              <li class="col-md-3 col-sm-6 md-margin-bottom-30">
                <div class="easy-block-v1">
                  <img onclick="openModalImage('modal148')" src="{{ $nov->imagen }}" alt="" style="cursor:zoom-in;">
                  <div class="easy-block-v1-badge rgba-red">
                    {{ $nov->fecha }}                 </div>
                </div>
                <div class="block-grid-v2-info rounded-bottom  bloques_eventos">
                  <h5>
                @if($nov->informacion!=null)
                  <b><a href="{{ url('/novedad/consultar', ['id' => $nov->id]) }}">{{ $nov->titulo }}</a></b>
                @else
                  <b>{{ $nov->titulo }}</b>
                @endif  
                  </h5>
                </div>
              </li>
               @endforeach
                                 
              
              
            </ul>
           <!-- <a href="./index.php?modulo=principal" class="btn-u btn-u-sm pull-right tooltips" data-toggle="tooltip" data-placement="left" data-original-title="Ver más novedades">Ver más <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
          -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



                            <div class="headline">
                                <div class="owl-navigation">
                                    <div class="customNavigation">
                                        <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
                                        <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div><!--/navigation-->
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<!-- FIN EVENTOS --->



<!-- ICONOS REDES SOCIALES -->
@include('layouts.socialnetworks')

<!-- FIN ICONOS REDES SOCIALES -->
@include('layouts.footeruser')

    

</div><!--/wrapper-->
<!--=== Footer Version 1 ===-->
<!-- organismos de control -->
<!--=== End Footer Version 1 ===-->
<script type="text/javascript" src="{{ asset ("/assets/plugins/jquery/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/jquery/jquery-migrate.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/pgwslider/pgwslider.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/back-to-top.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/smoothScroll.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/owl-carousel/owl-carousel/owl.carousel.min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/horizontal-parallax/js/sequence.jquery-min.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/greensock.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/layerslider.transitions.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/plugins/layer-slider/layerslider/js/layerslider.kreaturamedia.jquery.js") }}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/plugins/custom.min.js") }}"></script>
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
<script type="text/javascript" src="{{ asset ("/flexslider/jquery.flexslider.js") }}"></script>
<script type="text/javascript">
  $('.flexslider').flexslider({
    animation: "slide"
  
});
</script>

</body>
</html>
