@extends('layouts.app')

@section('content')
<style>
.active{
	background-color:#d8341a;
		color: #ffffff;
}
</style>
<script type="text/javascript">
$(document).ready(function () {
setTimeout(function(){
            $("input#lot_id").focus();},100);
});
</script>
<div class="container">
    <div class="row" >
	 <div class="col-md-10 col-md-offset-1">
		 <div class="pick" style="background-color:#ffffff;padding-bottom:15px;">
	 <div class="lat_location" style="background-color:#95959b;margin-bottom:20px;">
		 <div class="">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                        <li class="active" ><a href="{{ url('/lat_location') }}">Scan To Pick</a></li>
                        <li><a href="{{ url('/pick_list') }}">Pick List</a></li>
                </ul>

         </div>
			 </div>

	    <input type="hidden" class="form-control" name="token" id="token" value="{{csrf_token()}}" >
        <div class="col-md-12">
            <div class="panel panel-default" >
			 <div id="al_msg" style="background-color:#69c07a;color:#006400;padding-top:5px;padding-bottom:5px;text-align:center;display: none;" >  </div>
                <div class="panel-heading" style="background-color:#A9A9A9;color:#006400">Lot & Locations & GP  </div>

				{{Session::get('message')}}
			<div id="tab">
          <div class="total"><p>Total: <span style=""> {{$count}}</span></p></div>
			 @foreach($lotdata as $key=>$value)
             <p style="text-align:center" >Lot Id:  <span style="color:#006400">{{$value->lat_id}} </span></p>
			 <p style="text-align:center">GP: <span style="color:#006400">{{$value->gp_id}} </span></p>
			 <p style="text-align:center">Location Id: <span style="color:#006400"> {{$value->location_id}}</span></p>

            @if ($count>1)
             @if ($count_next>1)
			 <button onclick="skip_lot('{{$value->lat_loc_id}}');" style="" class="skip_but"> Skip </button>
		     @else
				<!-- <button style="float:right; margin-bottom:10px;" >NO Skip </button> -->
		     <button onclick="prious_lot('{{$value->lat_loc_id}}');" style="" class="skip_but"> Skip </button>
		     @endif
			@else
			@endif
			 @endforeach
           </div>
           </div>
				<input type="hidden" class="form-control" name="token" id="token" value="{{csrf_token()}}" >
  <div class="form-horizontal listpage">
                        <div class="form-group">
						    <label for="lot_id" class="col-md-3 control-label" style="margin-top:10px">Lot ID:</label>
                            <div class="col-md-9" style="margin-top:10px">
                                <input  type="text" class="form-control" name="lot_id" id="lot_id" value=""  >
                            </div>
                            <label for="location_id" class="col-md-3 control-label" style="margin-top:10px" >Location ID:</label>
                            <div class="col-md-9" style="margin-top:10px">
                                <input  type="text" class="form-control" name="location_id" id="location_id" value=""  >
                            </div>

                        </div></div>
        </div>
	  </div>
	</div>
    </div>
</div>


<script type="text/javascript">

$("#lot_id").keypress(function(e) {
    if(e.which == 13 ||e.which == 0) {
		var route="<?php echo url('check_lot_id_pick/'); ?>";
      //var route="http://localhost:8000/check_lot_id_pick";
	 var token=$("#token").val();
	 var lot_id=$("#lot_id").val();
	 if(lot_id !=''&& lot_id !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{lot_id:lot_id},
				dataType:'json',
				success: function(result){

					if(result.status=='1')
					{
						  $("#location_id").focus();
					}
					else{
						$("#lot_id").val('');
						 $("#al_msg").show();
							 $("#al_msg").html(result.message);
							 setTimeout(function(){
								 $("#al_msg").html('');
								$( "#al_msg" ).hide( "slow", function() {
								  });
							 }, 2000);
					}

				  }
				});
		 }
		 else{
			  $("#al_msg").show();
							 $("#al_msg").html(result.message);
							 setTimeout(function(){
								 $("#al_msg").html('');
								$( "#al_msg" ).hide( "slow", function() {
								  });
							 }, 2000);
		 }
    }
	else{
		//console.log(e.which);
	}
});
$("#location_id").keypress(function(e) {
    if(e.which == 13||e.which == 0) {
		var route="<?php echo url('update_lot_status/'); ?>";
      //var route="http://localhost:8000/update_lot_status";
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

					if(result.status=='1')
					{
						$("#tab").load('<?php echo url('update_pick'); ?>');
					    $("#lot_id").val('');
					    $("#location_id").val('');
						$("#lot_id").focus();
						 $("#al_msg").show();
					      $("#al_msg").html(result.message);
					      setTimeout(function(){
                         $("#al_msg").html('');
						  $( "#al_msg" ).hide( "slow", function() {
						     });
					      }, 2000);
					}
					else{
						 $("#al_msg").show();
							 $("#al_msg").html(result.message);
							 setTimeout(function(){
								 $("#al_msg").html('');
								$( "#al_msg" ).hide( "slow", function() {
								  });
							 }, 2000);
					}

				  }
				});
		 }
		 else{
			 alert("Please enter lot number");
		 }
    }
	else{
		//console.log(e.which);
	}
});
function skip_lot(sno)
{
	 if(sno !=''&& sno !='null')
		 {

			$("#tab").load("<?php echo url('next_lot_pick/'); ?>"+'/'+sno);
		 }
		 else{
			 alert("NO Serial number");
		 }
}
function prious_lot(sno)
{
	 if(sno !=''&& sno !='null')
		 {

			$("#tab").load("<?php echo url('previous_lot_pick/'); ?>"+'/'+sno);
		 }
		 else{
			 alert("NO Serial number");
		 }
}
function update_pickup_status(lot_id)
{
   console.log(lot_id);
   var route="<?php echo url('update_lot_status/'); ?>";
	//var route="http://localhost:8000/update_lot_status";
	 var token=$("#token").val();
	 if(lot_id !=''&& lot_id !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{lot_id:lot_id},
				dataType:'json',
				success: function(result){
					alert(result.message);
					$("#tab").load('<?php echo url('update_pick'); ?>');
				  }
				});
		 }
		 else{
			 alert("Please enter lot number");
		 }
}
$(document ).ready(function() {
$("#al_msg").hide();
});
</script>
@endsection
