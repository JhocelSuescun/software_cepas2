<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ("assets/img/apple-icon.png")}}" />
    <link rel="icon" type="image/png" href="{{ asset ("assets/img/favicon.png")}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset ("assets/css/bootstrap.min.css")}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset ("assets/css/material-dashboard.css?v=1.2.1")}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset ("adminlte/plugins/datatables/jquery.dataTables.min.css") }}">
    <link rel="stylesheet" href="{{ asset ("css/estilo.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset ("/flexslider/flexslider.css") }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>


</head>

<body>
    <div class="wrapper">
        @include('layouts.sidebar2')
        
        <div class="main-panel">
        @include('layouts.header2')
        @yield('content')

            
           @include('layouts.footer2')
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset ("assets/js/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("assets/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("assets/js/material.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("assets/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset ("assets/js/arrive.min.js")}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset ("assets/js/jquery.validate.min.js")}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset ("assets/js/moment.min.js")}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset ("assets/js/chartist.min.js")}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset ("assets/js/jquery.bootstrap-wizard.js")}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset ("assets/js/bootstrap-notify.js")}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset ("assets/js/bootstrap-datetimepicker.js")}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset ("assets/js/jquery-jvectormap.js")}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ asset ("assets/js/nouislider.min.js")}}"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset ("assets/js/jquery.select-bootstrap.js")}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset ("assets/js/jquery.datatables.js")}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset ("assets/js/sweetalert2.js")}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset ("assets/js/jasny-bootstrap.min.js")}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset ("assets/js/fullcalendar.min.js")}}"></script>
<script type="text/javascript" src="{{ asset ("/assets/js/es.js") }}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset ("assets/js/jquery.tagsinput.js")}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset ("assets/js/material-dashboard.js?v=1.2.1")}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset ("assets/js/demo.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
       // demo.initDashboardPageCharts();

        //demo.initVectorMap();
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "{{URL::to('/')}}/",
    selector: "#mytextarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality imagetools",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ],
    relative_urls: false, 
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script type="text/javascript" src="{{ asset ("/flexslider/jquery.flexslider.js") }}"></script>
@routes
<script src="{{ asset ("js/script.js") }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</html>