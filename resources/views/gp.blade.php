<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
 <script src="./js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="./js/additional-methods.min.js"></script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
		.navbar-default .navbar-nav > li > a{

         color: #000000 !important;
   

}
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" style="background-color:#69c07a">
        <div class="container">
           <!-- <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

               
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                 
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                       
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<img src="/uploads/avatar/{{Auth::user()->avatar}}" style="width:32px; height:32px; float:left; border-radius=50%; margin-right:25px;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
							     <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div> -->
			 <div class="col-md-12" style="background-color:#69c07a;margin-top:5px">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  
                        <li><a href="{{ url('/vendor') }}">Vendor</a></li>
                        <li><a href="{{ url('/gp') }}">Recive Lot</a></li>
						<li><a href="{{ url('/add_lat_location') }}">Assign Location</a></li>
						<li><a href="{{ url('/lat_location') }}">View Lot Status</a></li>
						
                </ul>

            </div>
        </div>
    </nav>

<div class="container">
     <div class="row">
		
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#A9A9A9;color:#006400">Add Gp and Vendor</div>
	
				
                <div class="panel-body">
                    <form class="form-horizontal" name="gpform" id="gpform" role="form" method="POST" action="{{ url('/add_lot') }}">
                        {{ csrf_field() }}
							
                        <div class="form-group">
                            <span for="vendorname" class="col-md-4 control-label">Vendor</span>

                            <div class="col-md-6">
							    <select name="vendorname" id="vendorname" class="selectpicker" data-live-search="true" onchange="change_vendor();">						
								<option value=""> Selcet Vendor </option>
								 @foreach($vendors as $key=>$value)
								 <option value="{{$value->vendor_name}}" >{{$value->vendor_name}} </option>	
								@endforeach
								</select>						
                            </div>
							<label id="vendorname-error" class="error" for="vendorname" style="visibility: visible; color: red;">&nbsp;</label>

                            
                        </div>

                        <div class="form-group">
                            <span for="gp" class="col-md-4 control-label">GP</span>

                            <div class="col-md-6">
                                <input id="gp" type="text" class="form-control"  name="gp" value="" >


                            </div>
							<label id="gp-error" class="error" for="gp" style="visibility: visible; color: red;">&nbsp;</label>
                        </div>
                    

                        <div class="form-group">
                            <label for="received_at" class="col-md-4 control-label">Received At</label>

                            <div class="col-md-6">
                                <input id="received_at" type="date" class="form-control" name="received_at" min="2014-05-11" max="{{ ($maxdate['date']) }}" value="{{ ($maxdate['date']) }}" >

                            </div>
							<label id="received_at-error" class="error" for="received_at" style="visibility: visible; color: red;">&nbsp;</label>
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

       
 <script>
 function change_vendor()
 {
	 var vendorname=$("#vendorname").val()
	 if(vendorname !='' && vendorname!='null')
	 {
		$("#vendorname-error").hide();
	 }
	 else{
		 $("#vendorname-error").show();
	 }
 }
 $(document).ready(function () {
$("#gpform").validate({
	rules: {
		vendorname: {
			 required: true  
		},
		gp: {
			required : true
		},
		received_at: {
			required : true
		}
	},

	messages: {
	vendorname: {
		 required:"Please select vendorname"
	},
	gp: {
		required : "Please enter gp"
	},
	received_at: {
			required : "Please choose date"
		}
	},
	ignore : []
});
});
</script>
<script type="text/javascript">
  //$('.selectpicker').selectpicker();
</script>
</body>
</html>
