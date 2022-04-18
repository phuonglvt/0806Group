@extends('layouts.admin')
@section('content')
<head>
	<title>Encouraged to contribute Ideas and Comments</title>
	<link rel="icon" href="https://cms.greenwich.edu.vn/pluginfile.php/1/theme_adaptable/favicon/1640228920/favicon.ico">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src={{asset('images/img-01.png')}} alt="IMG">
				</div>

				<form action="/email/{{$user->id}}" class="contact100-form validate-form" method="POST">
                    @csrf
					<span class="contact100-form-title">
						Invite to Contribute
                                            </span>
                                            @if(session()->has('message'))
                                                <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						{{-- @foreach($user as $name) --}}
						<input class="input100" type="text" name="name" placeholder="Name" value="{{$user->name}}">
						{{-- @endforeach --}}
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            @error('name')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="{{$user->email}}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                                            </div>
                                            <div class="wrap-input100 validate-input" data-validate = "Subject is required">
		        			<input class="input100" type="text" name="subject" placeholder="subject">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                                @error('subject')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
						<br/>

					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="content" placeholder="Message"></textarea>
                                        <span class="focus-input100"></span>
                                        @error('content')
                                           <span class="text-danger"> {{ $message }} </span>
                                         @enderror
                                        </div>
					<div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
							Send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src={{asset("vendor/jquery/jquery-3.2.1.min.js")}}></script>
	<!--===============================================================================================-->
	<script src={{asset("vendor/bootstrap/js/popper.js")}}></script>
	<script src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>
	<!--===============================================================================================-->
	<script src={{asset("vendor/select2/select2.min.js")}}></script>
	<!--===============================================================================================-->
	<script src={{asset("vendor/tilt/tilt.jquery.min.js")}}></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src={{asset('js/main.js')}}></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-23581568-13');
</script>

</body>
@endsection