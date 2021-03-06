@extends('main.main.app')
@section('content')
<?php $page = str_replace("school.", " ", Route::currentRouteName()); ?>
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
			<form role="form" method="POST" action="{{route('school.store')}}" class="signup" id="signup" enctype="multipart/form-data">
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
					</div>
				<div>
					<button type="submit" class="btn btn-info text-capitalize">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection