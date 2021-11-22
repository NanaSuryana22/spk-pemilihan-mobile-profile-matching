@extends('layout.master')
@section('title', "User / Pengguna")
@section('users', 'active')
@section('content')
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<div class="x_title">
					<h2>User (Pengguna)</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="btn btn-sm btn-link btn-primary" href="{{ route('users.create') }}" title="Tambah Data Pengguna"><i class="fa fa-plus-square-o"></i> Tambah Data Pengguna</a>
						</li>
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<livewire:user-index>
			</div>
		</div>
	</div>
</div>
@endsection