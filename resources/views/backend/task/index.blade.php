@extends('main.main.app')
@push('css')
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@section('content')
<task></task>
@endsection
@push('javascript')
	<script src="{{ asset('js/app.js') }}" defer></script>
@endpush