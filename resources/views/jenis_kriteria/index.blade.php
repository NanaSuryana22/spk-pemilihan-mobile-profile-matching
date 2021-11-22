@extends('layout.master')
@section('title', "Jenis Kriteria")
@section('jenis_kriteria', 'active')
@section('content')
<!-- page content -->
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Jenis Kriteria</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<livewire:jenis-kriteria-index>
			</div>
		</div>
	</div>
</div>
@endsection