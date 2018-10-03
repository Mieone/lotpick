@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add locations to Lat Id</div>

                <div class="panel-body">
                  <div class="form-horizontal">
                  {{Session::get('message')}}
				  <div id="al_msg" style="background-color:#69c07a;color:#006400;padding-top:5px;padding-bottom:5px;text-align:center;" >  </div>
                  <!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_lot_loc') }}">
                        {{ csrf_field() }} -->

					<input type="hidden" class="form-control" name="token" id="token" value="{{csrf_token()}}" >
                        <div class="form-group{{ $errors->has('lot_id') ? ' has-error' : '' }}" >
                            <label for="lot_id" class="col-md-4 control-label" style="margin-top:15px">Lot ID</label>

                            <div class="col-md-6" style="margin-top:15px">
                                <input  type="text" class="form-control" name="lot_id" id="lot_id" value=""  >

                                @if ($errors->has('lot_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lot_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}" style="margin-top:15px">
                            <label for="location_id-confirm" class="col-md-4 control-label" style="margin-top:15px">Location ID</label>

                            <div class="col-md-6" style="margin-top:15px">
                                <input  type="text" class="form-control" name="location_id" id="location_id">

                                @if ($errors->has('location_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     <!--    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form> -->
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function () {
	$("#al_msg").hide();
});
$("#lot_id").keypress(function(e) {
    if(e.which == 13 || e.which == 0) {
      var route="http://localhost:8000/check_lot_id";
	 var token=$("#token").val();
	 var lot_id=$("#lot_id").val();
	 var lotid =lot_id.split(" ").join("_");
	 if(lotid !=''&& lotid !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{lot_id:lotid},
				dataType:'json',
				success: function(result){

					if(result.status=='0')
					{
						 $("#al_msg").show();
					   $("#al_msg").html(result.message);
					     setTimeout(function(){
                         $("#al_msg").html('');
						$( "#al_msg" ).hide( "slow", function() {
						  });
					   }, 2000);

						$("#lot_id").val('');
					}

				  }
				});
		 }
		 else{

			 $("#al_msg").show();
					 $("#al_msg").html("Please enter lot number");
					 setTimeout(function(){
                         $("#al_msg").html('');
						$( "#al_msg" ).hide( "slow", function() {
						  });
					 }, 2000);

			 //alert("Please enter lot number");
		 }
    }
	else{
		//console.log(e.which);
	}
});

$("#location_id").keypress(function(e) {
    if(e.which == 13 || e.which == 0) {
     var route="http://localhost:8000/save_lot_loc";
	 var token=$("#token").val();
	 var lot_id=$("#lot_id").val();
	 var location_id=$("#location_id").val();
	 if(lot_id !=''&& lot_id !='null' && location_id!=''&& location_id !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{lot_id:lot_id,location_id:location_id},
				dataType:'json',
				success: function(result){
					 $("#al_msg").show();
					 $("#al_msg").html(result.message);
					 setTimeout(function(){
                         $("#al_msg").html('');
						$( "#al_msg" ).hide( "slow", function() {
						  });
					 }, 2000);
					if(result.status=='0')
					{
						//alert(result.message);
						$("#lot_id").val('');
					    $("#location_id").val('');
					}
					else{
						$("#lot_id").val('');
					    $("#location_id").val('');
					}

				  }
				});
		 }
		 else{
			 alert("Please enter lot and location");
		 }
    }
	else{
		//console.log(e.which);
	}
});
</script>
@endsection
