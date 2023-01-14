@extends('backend.master')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="margin: 35px 0">
			<div class="card" style=" border-radius:10px; padding: 25px; text-item:center; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
				<div class="card-header bg-primary text-white text-center">
					<h2>Update Vendor</h2>
				</div>
				<div class="card-body">
					@if(session()->has('success'))
					<div class="alert alert-success"> {{session()->get('success')}} </div>
					@endif
					@if(session()->has('error'))
					<div class="alert alert-success"> {{session()->get('error')}} </div>
					@endif
					<form action=" {{url('/vendor/update/'.$vendor->id)}} " method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" value="{{ $vendor->name }}" class="form-control" name="name" placeholder="Enter your name">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input disabled type="email" id="email" value="{{ $vendor->email }}" class="form-control" name="email" placeholder="Enter your email">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" id="phone" value="{{ $vendor->phone }}" class="form-control" name="phone" placeholder="Enter your phone">
						</div>
						
						<label for="">Status</label>
						<select class="form-control" name="is_approved">
							<option disabled>Select A Status</option>
							<option value=" {{1}}" @if($vendor->is_approved==1) Selected @endif>  Approved</option>
							<option value=" {{0}} " @if($vendor->is_approved==0) Selected @endif>Pendding</option>
						</select>
					
						<div class="form-group">
							<label for="address">Address</label>
							<textarea name="address" id="address" placeholder="address" class="form-control" >{{ $vendor->address }}</textarea>
						</div>
						<div class="form-group">
							<label for="logo">Logo</label>
							<input type="file" id="logo"  class="form-control" name="logo">
							<img class="mt-3" src=" {{asset('/avater/'.$vendor->logo)}} " height="80" width="80" alt="">
						</div>
						<button type="submit" class="btn btn-success btn-block">Update</button>
						
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>		
</div>

@endsection