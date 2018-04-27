<!DOCTYPE html>
<html>
<head>
	<title>Laravel Ajax Validation Example</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	!-- jQuery 3 -->
<script src="{{ asset ("adminlte/bower_components/jquery/dist/jquery2.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ("adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("adminlte/dist/js/adminlte.min.js") }}"></script>
</head>
<body>


	<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir Superficie</button>
        </div>
    </div>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">

       	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> 

    <div class="container">
	<h2>Laravel Ajax Validation</h2>

<div class="alert alert-danger print-error-msg2" style="display:none">
        <ul></ul>
    </div>


	<form>
		{{ csrf_field() }}
		<div class="form-group">
			<label>First Name:</label>
			<input type="text" name="first_name" class="form-control" placeholder="First Name">
		</div>


		<div class="form-group">
			<label>Last Name:</label>
			<input type="text" name="last_name" class="form-control" placeholder="Last Name">
		</div>


		<div class="form-group">
			<strong>Email:</strong>
			<input type="text" name="email" class="form-control" placeholder="Email">
		</div>


		<div class="form-group">
			<strong>Address:</strong>
			<textarea class="form-control" name="address" placeholder="Address"></textarea>
		</div>


		<div class="form-group">
			<button class="btn btn-success btn-submit">Submit</button>
		</div>
	</form>
</div>


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">


	$(document).ready(function() {
	    $(".btn-submit").click(function(e){
	    	e.preventDefault();


	    	var _token = $("input[name='_token']").val();
	    	var first_name = $("input[name='first_name']").val();
	    	var last_name = $("input[name='last_name']").val();
	    	var email = $("input[name='email']").val();
	    	var address = $("textarea[name='address']").val();


	        $.ajax({
	            url: "/my-form",
	            type:'POST',
	            data: {_token:_token, first_name:first_name, last_name:last_name, email:email, address:address},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	alert(data.success);
	                }else{
	                	printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	    function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});

			$(".print-error-msg2").find("ul").html('');
			$(".print-error-msg2").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg2").find("ul").append('<li>'+value+'</li>');
			});
		}
	});


</script>


</body>
</html>