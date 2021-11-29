@extends('layout.master')
@section('title', "Penilaian")
@section('penilaian', 'active')
@section('content')
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		@include('penilaian.filter')
		@include('penilaian.desc')
		@include('penilaian.data_penilaian')
	</div>
</div>
@endsection