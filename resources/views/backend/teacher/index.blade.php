@extends('main.main.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a href="{{ route('teacher.create')}}" class="btn btn-sm btn-info text-capitalize" data-toggle="tooltip" data-placement="top" title="Issue Book">Add Teacher</a>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="{{request()->url()}}" data-source-selector="#card-refresh-content"><i class="fas fa-sync-alt"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered" id="teacher_ajax">
								<thead class="bg-secondary">                  
									<tr>
										<th>SN</th>
										<th>Full Name</th>
										<th>Address</th>
										<th>Phone No</th>
										<th>Subject</th>
										<th>Action</th>
									</tr>
								</thead>
								
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
@push('javascript')
<script src="{{url('/')}}/backend/js/jquery.dataTables.js"></script>
<script src="{{url('/')}}/backend/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
	$('#teacher_ajax').DataTable({
		"processing" : true,
		"language" : {
			processing: '<i class="nav-icon fas fa-tachometer-alt"></i><span class="sr-only">Techware School System......</span> '
		},
		"serverSide" : true,
		"ajax" : {
			"url" : "{{ route('getAllTeacher')}}",
			"dataType" : "json",
			"type" : "POST",
			"data" : {
				_token: $('meta[name="csrf-token"]').attr('content'),
			}
		},
		"columns" : [
			{ "data": "id"},
			{"data" : "name"},
			{"data" : "address"},
			{"data" : "phone_no"},
			{ "data" : "subject"},
			{ "data" : "action"},
		],
		"order" : [
			[ 0 , "asc"]
		]
	});
</script>
@endpush