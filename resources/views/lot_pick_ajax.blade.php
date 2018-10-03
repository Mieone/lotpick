<div class="total"><p>Total: <span> {{$count}}</span></p></div>
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
