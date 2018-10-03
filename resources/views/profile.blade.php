@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@if ($user->has('name'))
        <div class="col-md-10 col-md-offset-1">
           <h2>{{$user->name}} 's profile </h2>
		   <img src="/uploads/avatar/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius=50%; margin-right:25px;">
		   <form enctype="multipart/form-data" action="/profile" method="POST">
		    <label>Update profile image </label>
			<input type="file" name="avatar">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="submit" class="pull-right btn btn-sm btn-primary">
		   </form>
        </div>
		@endif
    </div>
</div>
@endsection
