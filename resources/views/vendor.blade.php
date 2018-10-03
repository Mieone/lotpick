@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Vendor's</div>
				<div class="session-_msg">{{Session::get('message')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vendor_save') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vendor_name') ? ' has-error' : '' }}">
                            <label for="vendor_name" class="col-md-3 control-label">Vendor Name</label>

                            <div class="col-md-6">
                                <input id="vendor_name" type="text" class="form-control" name="vendor_name" value="{{ old('vendor_name') }}" >

                                @if ($errors->has('vendor_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

        <div class="tableData">
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
       </div>
            </div>
        </div>
    </div>
</div>
@endsection
