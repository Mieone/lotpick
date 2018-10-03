@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Whare Houses</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Lot ID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gp') ? ' has-error' : '' }}">
                            <label for="gp" class="col-md-4 control-label">GP</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="gp" value="{{ old('gp') }}" required>

                                @if ($errors->has('gp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('received_at') ? ' has-error' : '' }}">

                            <label for="src" class="col-md-4 control-label">SRC</label>

                            <div class="col-md-6">
                                <input id="src" type="text" class="form-control" name="src" required>

                                @if ($errors->has('src'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('src') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('received_at') ? ' has-error' : '' }}">
                            <label for="received_at-confirm" class="col-md-4 control-label">Received At</label>

                            <div class="col-md-6">
                                <input id="received_at-confirm" type="date" class="form-control" name="received_at" required >

                                @if ($errors->has('received_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('received_at') }}</strong>
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
            </div>
        </div>
    </div>
</div>
@endsection
