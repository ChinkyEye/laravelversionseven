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
					<!-- <ul class="list-group list-group-horizontal float-sm-right">
						<li class="list-group-item" style="border: none;"><a href="{{route('home')}}">Home</a></li>
						<li class="list-group-item" style="border: none;">Page</li>
					</ul> -->
					<!-- <ul class="navbar-nav navbar-expand float-sm-right">
						<li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home /</a></li>
						<li class="nav-item active text-capitalize"><a class="nav-link" href="{{route('home')}}">Page</a></li>
					</ul> -->
				</div>
			</div>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{route('student.store')}}" class="signup" id="signup" enctype="multipart/form-data">
				@csrf
					<div class="row">
						<div class="form-group col-md">
							<label for="name">Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="name" name="name" autocomplete="off" value="">
						</div>
						<div class="form-group col-md">
							<label for="address">Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="address" name="address" autocomplete="off" value="">
						</div>
						<div class="form-group col-md">
							<label for="phone_no">Phone No<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="phone_no" name="phone_no" autocomplete="off" value="{{ old('end_date') }}">
						</div>
						<div class="form-group col-md-12">
							<label for="image">Choose CoverImage</label>
							<small class="text-danger mr-4">*required</small>
							<div class="input-group">
								<input type="file" class="form-control d-none" id="image" name="image" value="{{ old('image') }}">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl1xtOkMGh312RKiJXUPbwyODQ7hdHgHFqYR5RwBGHiKaKz9eO&s" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
							</div>
						</div>
					</div>
				<div>
					<button type="submit" class="btn btn-info text-capitalize">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@push('javascript')
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();  //read the contents of files
      reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
      } //the file's text will be printed here
      reader.readAsDataURL(input.files[0]); //read the binary data and encode it as base64 data url
    }
  }
  $("#image").change(function(){
    readURL(this);
  });
</script>
@endpush