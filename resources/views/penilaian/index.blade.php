@extends('layout.master')
@section('title', "Penilaian")
@section('penilaian', 'active')
@section('content')
<!-- page content -->
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Penilaian</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('penilaian.index') }}" method="get">
					@foreach ($kriteria as $k)
						<div class="item form-group">
							<label for="$k->id" class="col-form-label col-md-3 col-sm-3 label-align">{{ $k->nama }}</label>
							<select class="form-control" name="{{$k->id}}" required>
								@foreach ($k->sub_kriterias as $i)
									<option value="{{ $i->id }}">{{ $i->nama }}</option>
								@endforeach
							</select>
						</div>
					@endforeach
					<div class="ln_solid"></div>

          <div class="form-group row">
          	<div class="col-md-9 offset-md-3">
           		<button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-success">Proses</button>
            </div>
          </div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Keterangan Data Penilaian</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-12">
					<center>
						<h3>Ini merupakan halaman penilaian</h3>
						<hr>
						<p>Halaman ini digunakan untuk menghitung / mengakumulasi data pemilihan mobil menggunakan metode profile matching</p>
						<div class="clearfix"></div>
					</center>
					<hr>
					<center>
						<h2><span class="count_top"><i class="fa fa-car"></i> Total Data Mobil</span>
						<div class="count"><i class="green">{{ $mobil->count(); }}</i> </div>
						<span class="count_bottom">Dari Data Mobil (Alternatif) Yang Telah Diinput.</span></h2>
					</center>
					<hr>
					<center>
						<h2><span class="count_top"><i class="fa fa-car"></i> Total Data Kriteria</span>
						<div class="count"><i class="green">{{ $kriteria->count(); }}</i> </div>
						<span class="count_bottom">Dari Data Kriteria Yang Telah Diinput.</span></h2>
					</center>
					<hr>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Penilaian</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection