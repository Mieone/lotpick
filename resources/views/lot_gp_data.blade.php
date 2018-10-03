  <div class="panel panel-default" >
                <div class="panel-heading" style="background-color:#A9A9A9">Lot & GP  </div>	           
			<div >	
    <table class="table table-bordered ">
              <thead>
				  <tr>
				  
				    <th> Lot Id </th>
				    <th> GP </th>				    
				  </tr>
				     </thead>
			 <tbody>
				  @foreach($lotdata as $key=>$value)
				  <tr>
				    <td> {{$value->lot_id}} </td>
				    <td> {{$value->gp_id}} </td>				  
				  </tr>
				  @endforeach
				</tbody>
  </table>
  </div>	
  </div>	