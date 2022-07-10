@extends('layouts.frontend')
@section('title') Home
@endsection
@section('content')
 {{-- @include('frontend.slider.slider') --}}
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-12">
			<h2>My Profile Page</h2> @if(session('status'))
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button> {{session('status')}} </div> @endif
			<div class="card">
				<div class="card-body">
					<form action="{{url('my-profile-update')}}" method="POST" enctype="multipart/form-data"> @csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">First Name:</label>
									<input type="text" class="form-control" name="name" placeholder="Enter Name" id="Name" value="{{Auth::user()->name}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Last Name:</label>
									<input type="text" class="form-control" name="lname" placeholder="Enter Name" id="Name" value="{{Auth::user()->lname}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Email:</label>
									<input type="email" class="form-control" name="email" placeholder="Enter Name" id="Name" value="{{Auth::user()->email}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Address 1(FlatNo,Apt No,|Address)</label>
									<input type="text" class="form-control" name="addres1" placeholder="Enter Name" id="Name" value="{{Auth::user()->addres1}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Address 2(landmark, near by)</label>
									<input type="text" class="form-control" name="addres2" placeholder="Enter Name" id="Name" value="{{Auth::user()->addres2}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">City:</label>
									<input type="text" class="form-control" name="city" placeholder="Enter Name" id="Name" value="{{Auth::user()->city}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">State:</label>
									<input type="text" class="form-control" name="state" placeholder="Enter Name" id="Name" value="{{Auth::user()->state}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">pincode/zipcode:</label>
									<input type="text" class="form-control" name="pincode" placeholder="Enter Name" id="Name" value="{{Auth::user()->pincode}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Phone No:</label>
									<input type="tel" class="form-control" name="phone" placeholder="Enter Name" id="Name" value="{{Auth::user()->phone}}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Name">Alternate Phone No:</label>
									<input type="text" class="form-control" name="alternate_phone" placeholder="Enter Name" id="Name" value="{{Auth::user()->alternate_phone }}"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="profile">Choose Profile:</label>
									<input type="file" class="form-control" name="image"> </div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input type="submit" class="form-control btn btn-primary btn-sm " value="Update Profile" style="margin-top:36px;"> </div>
							</div>
							<div class="col-md-2">
								<div class="form-group"> <img src="{{asset('upload/profile/'.Auth::user()->image)}}" class=" img-thumbnail mt-4" style="width:50px;height:50px;"> </div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> 
@endsection