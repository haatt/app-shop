@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
    <div class="header header-filter" style="background-image: url('{{ asset('/img/city.jpg')}}'); background-size: cover; background-position: top center;">
			
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<form class="form" method="POST" action="{{ route('login') }}">
						@csrf
							<div class="header header-primary text-center">
								<h4>Sign Up</h4>
								<div class="social-line">
									<!--a href="#pablo" class="btn btn-simple btn-just-icon">
										<i class="fa fa-facebook-square"></i>
									</a>
									<a href="#pablo" class="btn btn-simple btn-just-icon">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#pablo" class="btn btn-simple btn-just-icon">
										<i class="fa fa-google-plus"></i>
									</a-->
								</div>
							</div>
							<div class="content">

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password...">
									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>

								<div class="checkbox">
									<label class="form-check-label" for="remember">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										{{ __('Remember-Me') }}
									</label>
								</div>

								<!-- If you want to add a checkbox to this form, uncomment this code

								<div class="checkbox">
									<label>
										<input type="checkbox" name="optionsCheckboxes" checked>
										Subscribe to newsletter
									</label>
								</div> -->
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-simple btn-primary btn-lg">
									{{ __('Login') }}
								</button>
								<a class="btn btn-simple btn-primary btn-xs" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@include('includes.footer')
	</div>
	
@endsection