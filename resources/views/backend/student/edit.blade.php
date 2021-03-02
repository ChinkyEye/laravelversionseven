@extends('main.main.app')
@section('content')
<?php $page = str_replace("student.", " ", Route::currentRouteName()); ?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-6 pl-1">
					<h1 class="text-capitalize">{{$page}} Page</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item active text-capitalize">Page</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="card-body">
			@foreach($students as $key => $student)
			<form role="form" method="POST" action="{{route('student.update',$student->id)}}" class="signup" id="signup">
				@csrf
				@method('PATCH')
					<div class="row">
						<div class="form-group col-md">
							<label for="name">Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{$student->name}}">
						</div>
						<div class="form-group col-md">
							<label for="address">Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{$student->address}}">
						</div>
						<div class="form-group col-md">
							<label for="phone_no">Phone No<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="phone_no" name="phone_no" autocomplete="off" value="{{$student->phone_no}}">
						</div>
						<div class="form-group col-md-12">
							<label for="image">Choose CoverImage</label>
							<small class="text-danger mr-4">*required</small>
							<div class="input-group">
								<input type="file" class="form-control d-none" id="image" name="image" value="{{ old('image') }}">
								<img src="{{ URL::to('/')}}/images/teacher/{{$student->image}}" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
							</div>
						</div>
					</div>
				<div>
					<button type="submit" class="btn btn-info text-capitalize">Update</button>
				</div>
			</form>
			@endforeach
		</div>
	</div>
</div>
@endsection