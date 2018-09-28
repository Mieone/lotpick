          <table class="table table-bordered ">
    <thead>
				  <tr>
				    <th> S.No </th>
				    <th> Lot Id </th>
				    <th> GP </th>
				    <th> Location  </th>
				    <th> PICK  </th>
				  </tr>
				     </thead>
    <tbody>
				  @foreach($lotdata as $key=>$value)
				  <tr>
				    <td> {{$key+1}} </td>
				    <td> {{$value->lat_id}} </td>
				    <td> {{$value->gp_id}} </td>
				    <td> {{$value->location_id}} </td>
					@if($value->status =='1')         
						  <td onclick="update_pickup_status('{{$value->lat_id}}')" class="btn btn-primary" style="display: block; text-align: center; margin: auto;">Pick Up</td>         
					@else
						  <td class="btn btn-danger" >Picked</td>        
					@endif
				    
				  </tr>
				  @endforeach
				</tbody>
  </table>