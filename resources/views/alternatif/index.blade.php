@extends('layout.master')
@section('title', "Kriteria")
@section('kriteria', 'active')
@section('content')
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Mobil (Alternatif)</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="btn btn-sm btn-link btn-primary" href="{{ route('alternatif.create') }}" title="Tambah Data Mobil"><i class="fa fa-plus-square-o"></i> Tambah Data Mobil</a>
						</li>
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<livewire:alternatif-index>
			</div>
		</div>
	</div>
</div>
@endsection