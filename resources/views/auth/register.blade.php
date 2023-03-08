@extends('frontend.master')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="margin: 35px 0">
			<div class="card" style=" border-radius:10px; padding: 25px; text-item:center; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
				<div class="card-header">
					<h2 style="text-align: center;">User Registration</h2>
				</div>
				<div class="card-body">
					{{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
					<form action=" {{ route('register')}} " method="POST" >
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" class="form-control" name="name" placeholder="Enter your name">
                            @error('name')
                                <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
                            @enderror
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" placeholder="Enter your email">
                            @error('email')
                            <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
                            @enderror
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" id="phone" class="form-control" name="phone" placeholder="Enter your phone">
                            @error('phone')
                                <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
                             @enderror
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea name="address" id="address" placeholder="address" class="form-control" ></textarea>
                            @error('address')
                                <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
                            @enderror
						</div>

						<div class="form-group">
							<label for="password">password</label>
							<input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                            @error('password')
                                <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
                            @enderror
						</div>
						<button type="submit" class="btn btn-success btn-block">Registration</button>
						<br>
						<span>I already have an account, </span><a style="color: rgb(3, 19, 248); font-weight:blod; " href=" {{ route('login') }}">Login</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

@endsection
