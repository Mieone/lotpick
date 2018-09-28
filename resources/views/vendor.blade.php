@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#A9A9A9;color:#006400">Vendor's</div>
				{{Session::get('message')}}
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vendor_save') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vendor_name') ? ' has-error' : '' }}">
                            <label for="vendor_name" class="col-md-4 control-label">Vendor Name</label>

                            <div class="col-md-6">
                                <input id="vendor_name" type="text" class="form-control" name="vendor_name" value="{{ old('vendor_name') }}" >

                                @if ($errors->has('vendor_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
				<center>
				
			 <table class="table table-bordered">
				  <tr>
				    <th> S.No </th>
				    <th> Vendor Name </th>
				  </tr>
				  
				  @foreach($vendors as $key=>$value)
				  <tr>
				    <td> {{$key+1}} </td>
				    <td> {{$value->vendor_name}} </td>
				  </tr>
				  @endforeach
				 </table> 
				</center>
				
            </div>
        </div>
    </div>
</div>
@endsection
