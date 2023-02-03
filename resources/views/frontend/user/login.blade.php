@extends('frontend.master')

@section('content')


<div class="container">
	<div class="row" style="margin: 35px 0;">
		<div class="col-md-4"></div>
		<div class="col-md-4 " style="margin: 20px 0 20px 0">
			<div class="card" style=" border-radius:10px; padding: 25px; text-item:center; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
				<div class="card-header">
					<h2 style="text-align: center;">User Login</h2>
				</div>
				<div class="card-body">
					@if(session()->has('error'))
						<div class="alert alert-danger"> {{session()->get('error')}} </div>
					@endif
					<form action="{{ url('/user/login') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" placeholder="Enter your email">
						</div>
						<div class="form-group">
							<label for="password">password</label>
							<input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
						<br>
						<span>I don't have an account, </span><a style="color: rgb(3, 19, 248); font-weight:blod; " href=" {{ url('/user/registration') }}">Create new</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
		
	</div>
</div>

@endsection