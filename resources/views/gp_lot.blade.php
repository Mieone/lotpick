@extends('layouts.app')

@section('content')
<script type="text/javascript">
$(document).ready(function () {
setTimeout(function(){
            $("input#lot_id").focus();},100);
});
</script>
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Lot Id's</div>

				{{Session::get('message')}}
                <div class="panel-body">
                <div class="form-horizontal">
<div id="al_msg" style="background-color:#69c07a;color:#006400;padding-top:5px;padding-bottom:5px;text-align:center;display: none;margin-bottom:10px;" >  </div>
					<input type="hidden" class="form-control" name="token" id="token" value="{{csrf_token()}}" >

                        <div class="form-group{{ $errors->has('gp_number') ? ' has-error' : '' }}">
                            <label for="gp_number" class="col-md-2 control-label lotright">GP</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="gp_number" id="gp_number" value="{{$gp_number}}" readonly >

                                @if ($errors->has('gp_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gp_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('lot_id') ? ' has-error' : '' }}">
                            <label for="lot_id-confirm" class="col-md-2 control-label lotright">Lot ID</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="lot_id" id="lot_id">

                                @if ($errors->has('lot_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lot_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                           <!-- <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary" id="savelot"
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>-->
							<div class="col-md-4 col-md-offset-4 close_but">
                                <a href="{{ url('/gp') }}"><i class="fa fa-btn fa-times"></i> Close</a>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
		 <div class="col-md-10 col-md-offset-1" id="gp_lot">

        </div>
    </div>
</div>


<script type="text/javascript">
$("#lot_id").keypress(function(e) {
    if(e.which == 13) {
        var token=$("#token").val();
	 var gp_number=$("#gp_number").val();
	 console.log(gp_number)
	 var lot_id=$("#lot_id").val();
     //var route="http://localhost:8000/save_lot";
     var route="<?php echo url('save_lot/'); ?>";
	 var gpid =gp_number.split(" ").join("_");
	 if(lot_id !=''&& lot_id !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{gp_number:gp_number,lot_id:lot_id},
				dataType:'json',
				success: function(result){
					 $("#al_msg").show();
					   $("#al_msg").html(result.message);
					     setTimeout(function(){
                         $("#al_msg").html('');
						$( "#al_msg" ).hide( "slow", function() {
						  });
					   }, 2000);
					   
					if(result.status=='1')
					{
						$("#lot_id").val('');
						$("#gp_lot").load("<?php echo url('update_lot_gp/'); ?>"+'/'+gpid);
					}
					else{
						//alert(result.message);
					    $("#lot_id").val('');
					}
                    $('#lot_id').focus();
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
			
		 }
    }
	else{
		console.log(e.which);
	}
});
  $("#savelot").click(function(){

	 var token=$("#token").val();
	 var gp_number=$("#gp_number").val();
	 var lot_id=$("#lot_id").val();
     var route="<?php echo url('save_lot/'); ?>";
	 if(lot_id !=''&& lot_id !='null')
		 {
			   $.ajax({
				type:"POST",
				url:route,
				headers:{'X-CSRF-TOKEN':token},
				data:{gp_number:gp_number,lot_id:lot_id},
				dataType:'json',
				success: function(result){
					alert(result.message);
					$("#lot_id").val('');
				  }
				});
		 }
		 else{
			 alert("Please enter lot number");
		 }

  });
</script>
@endsection
